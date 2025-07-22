<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/webhook.log');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../auth-system/config/db.php';
require_once __DIR__ . '/../config/stripe.php';

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

if ($event->type === 'checkout.session.completed') {

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
        // add monthly Gasergy credits for the user
        $invoice = $event->data->object;
        $subscriptionId = $invoice->subscription;
        $stmt = $pdo->prepare(
            "SELECT id, subscription_gasergy FROM users WHERE stripe_subscription_id = ?"
        );
        $stmt->execute([$subscriptionId]);
        $row = $stmt->fetch();
        if ($row) {
            $amount = intval($row['subscription_gasergy']);
            if ($amount > 0) {
                $stmt = $pdo->prepare(
                    "UPDATE users SET gasergy_balance = gasergy_balance + ? WHERE id = ?"
                );
                $stmt->execute([$amount, $row['id']]);
            }
        }
        $userLog = $row ? $row['id'] : 'n/a';
        file_put_contents(
            $logFile,
            "invoice.paid: subscription={$subscriptionId} user={$userLog}\n",
            FILE_APPEND
        );
        break;
    case 'invoice.payment_failed':
        $invoice = $event->data->object;
        file_put_contents($logFile,
            "invoice.payment_failed: subscription={$invoice->subscription} " .
            "customer={$invoice->customer}\n", FILE_APPEND);
        // notify the user or pause benefits
        break;

        default:
        file_put_contents($logFile,
            "Unhandled event {$event->type}\n", FILE_APPEND);
}

http_response_code(200);
