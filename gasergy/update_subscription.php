<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/stripe.php';
require_once __DIR__ . '/../auth-system/config/db.php';

$logFile = __DIR__ . '/subscription.log';
if (!file_exists($logFile)) {
    @touch($logFile);
}
function log_subscription($msg) {
    global $logFile;
    if (is_writable($logFile)) {
        file_put_contents($logFile, date('c') . ' ' . $msg . PHP_EOL, FILE_APPEND);
    } else {
        error_log('log_subscription failed: ' . $msg);
    }
}

set_error_handler(function ($severity, $message, $file, $line) {
    log_subscription("PHP error [$severity] $message in $file:$line");
});

set_exception_handler(function ($e) {
    log_subscription('Uncaught exception: ' . $e->getMessage());
    http_response_code(500);
    exit('Internal Server Error');
});

register_shutdown_function(function () {
    $err = error_get_last();
    if ($err && in_array($err['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        log_subscription('Fatal error: ' . $err['message'] . ' in ' . $err['file'] . ':' . $err['line']);
    }
});

log_subscription('update_subscription start user=' . ($_SESSION['user_id'] ?? 'none'));


if (!isset($_SESSION['user_id'])) {
    log_subscription('unauthorized access');
    http_response_code(403);
    exit('Unauthorized');
}

$amount = intval($_POST['amount'] ?? 0);
$priceId = priceForGasergy($amount);
if ($amount <= 0 || !$priceId) {
    log_subscription('invalid plan amount=' . $amount);
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
    log_subscription('no subscription for user=' . $userId);
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
    $stmt = $pdo->prepare("UPDATE users SET subscription_gasergy = ? WHERE id = ?");
    $stmt->execute([$amount, $userId]);

    // check invoice status
    $invoiceId = $updated->latest_invoice;
    $invoicePaid = false;
    if ($invoiceId) {
        $invoice = \Stripe\Invoice::retrieve($invoiceId);
        $invoicePaid = ($invoice->status === 'paid');
    }
} catch (Exception $e) {

    log_subscription('Stripe error updating ' . $subscriptionId . ': ' . $e->getMessage());

    http_response_code(500);
    exit('Stripe error');
}

$status = isset($invoicePaid) ? ($invoicePaid ? 'success' : 'pending') : 'error';
header('Location: manage_subscription.php?update=' . $status);
