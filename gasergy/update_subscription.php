<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/update_subscription.log');

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/stripe.php';
require_once __DIR__ . '/../auth-system/config/db.php';

function log_subscription($msg) {
    error_log($msg);
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit('Unauthorized');
}

$amount = intval($_POST['amount'] ?? 0);
$priceId = priceForGasergy($amount);
if ($amount <= 0 || !$priceId) {
    http_response_code(400);
    exit('Invalid plan');
}

log_subscription('requested amount=' . $amount . ' priceId=' . ($priceId ?: 'none'));


$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT stripe_subscription_id FROM users WHERE id = ?");
$stmt->execute([$userId]);
$subscriptionId = $stmt->fetchColumn();

log_subscription('db subscription id=' . ($subscriptionId ?: 'none') . ' for user=' . $userId);

if (!$subscriptionId) {
    http_response_code(400);
    exit('No active subscription');
}

\Stripe\Stripe::setApiKey($stripeSecretKey);
try {
    $subscription = \Stripe\Subscription::retrieve($subscriptionId);

    log_subscription('Stripe retrieved subscription id=' . $subscriptionId);

    $itemId = $subscription->items->data[0]->id;
    $updated = \Stripe\Subscription::update($subscriptionId, [
        'cancel_at_period_end' => false,
        'items' => [
            ['id' => $itemId, 'price' => $priceId]
        ],
        'proration_behavior' => 'create_prorations'
    ]);
    // The webhook will normally update the plan after the invoice is paid, but
    // if no charge is due, Stripe marks the invoice paid immediately and no
    // webhook may arrive. In that case, update the user record right away.

    // check invoice status
    $invoiceId = $updated->latest_invoice;
    $invoicePaid = false;
    $invoiceDue = null;
    if ($invoiceId) {
        $invoice = \Stripe\Invoice::retrieve($invoiceId);
        $invoicePaid = ($invoice->status === 'paid');
        $invoiceDue = $invoice->amount_due;
    }

    if ($invoicePaid && ($invoiceDue === 0 || $invoiceDue === null)) {
        // Immediate plan change with no charge. Apply upgrade locally.
        $stmt = $pdo->prepare("SELECT subscription_gasergy FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $oldGasergy = (int)($stmt->fetchColumn() ?: 0);
        $diff = $amount - $oldGasergy;
        if ($diff > 0) {
            $stmt = $pdo->prepare(
                "UPDATE users SET subscription_gasergy = ?, gasergy_balance = gasergy_balance + ? WHERE id = ?"
            );
            $stmt->execute([$amount, $diff, $userId]);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET subscription_gasergy = ? WHERE id = ?");
            $stmt->execute([$amount, $userId]);
        }
    }
} catch (Exception $e) {

    log_subscription('Stripe error updating ' . $subscriptionId . ': ' . $e->getMessage());

    http_response_code(500);
    exit('Stripe error');
}

$status = isset($invoicePaid) ? ($invoicePaid ? 'success' : 'pending') : 'error';
header('Location: manage_subscription.php?update=' . $status);
