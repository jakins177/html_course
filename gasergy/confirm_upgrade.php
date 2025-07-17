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

log_subscription('confirm_upgrade start user=' . ($_SESSION['user_id'] ?? 'none'));

if (!isset($_SESSION['user_id'])) {
    log_subscription('unauthorized access');

    http_response_code(403);
    exit('Unauthorized');
}

$amount = intval($_POST['amount'] ?? 0);
$priceId = priceForGasergy($amount);
if ($amount <= 0 || !$priceId) {

    log_subscription('invalid plan amount=' . $amount);
=======

    http_response_code(400);
    exit('Invalid plan');
}

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT stripe_subscription_id FROM users WHERE id = ?");
$stmt->execute([$userId]);
$subscriptionId = $stmt->fetchColumn();

if (!$subscriptionId) {

    log_subscription('no subscription for user=' . $userId);

    http_response_code(400);
    exit('No active subscription');
}

\Stripe\Stripe::setApiKey($stripeSecretKey);
try {
    $subscription = \Stripe\Subscription::retrieve($subscriptionId);

    $itemId = $subscription->items->data[0]->id;
    // Estimate proration cost using upcoming invoice
    $invoice = \Stripe\Invoice::upcoming([
        'customer' => $subscription->customer,
        'subscription' => $subscriptionId,
        'subscription_items' => [
            ['id' => $itemId, 'price' => $priceId]
        ],
        'subscription_proration_behavior' => 'create_prorations'
    ]);
    $amountDue = $invoice->amount_due / 100; // convert from cents
} catch (Exception $e) {

    log_subscription('Stripe error confirm_upgrade ' . $e->getMessage());

    http_response_code(500);
    exit('Stripe error');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Upgrade</title>
</head>
<body>
<h1>Confirm Plan Change</h1>
<p>You are upgrading to <?php echo htmlspecialchars(number_format($amount)); ?> Gasergy/month.</p>
<p>This upgrade will charge your saved payment method <strong>$<?php echo number_format($amountDue, 2); ?></strong> immediately for the prorated difference.</p>
<form action="update_subscription.php" method="POST" style="display:inline-block;margin-right:1em;">
    <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">
    <button type="submit">Confirm Charge</button>
</form>
<form action="manage_subscription.php" method="GET" style="display:inline-block;">
    <button type="submit">Cancel</button>
</form>
</body>
</html>
