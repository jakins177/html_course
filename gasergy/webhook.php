<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/webhook.log');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../auth-system/config/db.php';
require_once __DIR__ . '/../config/stripe.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);

$payload = @file_get_contents('php://input');
$sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload,
        $sigHeader,
        $stripeWebhookSecret
    );
} catch (Exception $e) {
    http_response_code(400);
    exit('Invalid signature');
}

// At the top, define the log file
$logFile = __DIR__ . '/webhook.log';
file_put_contents($logFile, date('c') . " webhook received\n", FILE_APPEND);

switch ($event->type) {
    case 'checkout.session.completed':
        $session = $event->data->object;
        $userId = $session->client_reference_id;
        $amount = intval($session->metadata->amount ?? 0);
        $subscriptionId = $session->subscription;

        if ($userId && $amount > 0) {
            try {
                $stmt = $pdo->prepare(
                    "UPDATE users SET gasergy_balance = gasergy_balance + ?, " .
                    "stripe_subscription_id = ?, subscription_gasergy = ? WHERE id = ?"
                );
                $stmt->execute([$amount, $subscriptionId, $amount, $userId]);
            } catch (Exception $e) {
                // log error in real setup
            }
        }

        file_put_contents(
            $logFile,
            "checkout.session.completed: user={$session->client_reference_id} " .
            "amount={$session->metadata->amount} subscription={$subscriptionId}\n",
            FILE_APPEND
        );
        break;
    case 'invoice.paid':
        // handle subscription invoices
        $invoice_id = $event->data->object->id;
        $invoice = \Stripe\Invoice::retrieve($invoice_id);
        $subscriptionId = $invoice->subscription;
        $billingReason = $invoice->billing_reason ?? '';

        // Determine the plan from the invoice lines
        $gasergyAmount = 0;
        foreach ($invoice->lines->data as $line) {
            if ($line->type === 'subscription' && isset($line->price->id)) {
                $gasergyAmount = gasergyForPrice($line->price->id) ?? 0;
                break;
            }
        }

        $userId = null;
        if ($subscriptionId) {
            $stmt = $pdo->prepare(
                "SELECT id FROM users WHERE stripe_subscription_id = ?"
            );
            $stmt->execute([$subscriptionId]);
            $userId = $stmt->fetchColumn();
        }

        if ($userId && $gasergyAmount > 0) {
            if ($billingReason === 'subscription_cycle' || $billingReason === 'subscription_create') {
                // Regular monthly invoice – add credits and record plan size
                $stmt = $pdo->prepare(
                    "UPDATE users SET gasergy_balance = gasergy_balance + ?, subscription_gasergy = ? WHERE id = ?"
                );
                $stmt->execute([$gasergyAmount, $gasergyAmount, $userId]);
            } elseif ($billingReason === 'subscription_update') {
                // Prorated upgrade, grant gasergy for the partial month
                $stmt = $pdo->prepare("SELECT subscription_gasergy FROM users WHERE id = ?");
                $stmt->execute([$userId]);
                $oldGasergy = $stmt->fetchColumn();

                if ($gasergyAmount > $oldGasergy) {
                    $gasergyDifference = $gasergyAmount - $oldGasergy;
                    $updateStmt = $pdo->prepare(
                        "UPDATE users SET gasergy_balance = gasergy_balance + ?, subscription_gasergy = ? WHERE id = ?"
                    );
                    $updateStmt->execute([$gasergyDifference, $gasergyAmount, $userId]);
                } else {
                    // downgrade or same plan, just update the plan size
                    $updateStmt = $pdo->prepare(
                        "UPDATE users SET subscription_gasergy = ? WHERE id = ?"
                    );
                    $updateStmt->execute([$gasergyAmount, $userId]);
                }
            }
        }

        file_put_contents(
            $logFile,
            "invoice.paid: subscription={$subscriptionId} user=" . ($userId ?: 'n/a') . " gasergy={$gasergyAmount} reason={$billingReason}\n",
            FILE_APPEND
        );
        break;
    case 'invoice.payment_failed':
        $invoice = $event->data->object;
        file_put_contents(
            $logFile,
            "invoice.payment_failed: subscription={$invoice->subscription} " .
            "customer={$invoice->customer}\n",
            FILE_APPEND
        );
        // notify the user or pause benefits
        break;

    case 'invoice.created':
        // just log for now
        $invoice = $event->data->object;
        file_put_contents(
            $logFile,
            "invoice.created: subscription={$invoice->subscription} " .
            "customer={$invoice->customer} reason={$invoice->billing_reason}\n",
            FILE_APPEND
        );
        break;

    default:
        file_put_contents(
            $logFile,
            "Unhandled event {$event->type}\n",
            FILE_APPEND
        );
}

http_response_code(200);
