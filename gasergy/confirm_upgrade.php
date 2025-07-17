<?php
session_start();

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
log_subscription('confirm_upgrade start user=' . ($_SESSION['user_id'] ?? 'none'));
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/stripe.php';
require_once __DIR__ . '/../auth-system/config/db.php';

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

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT stripe_subscription_id FROM users WHERE id = ?");
$stmt->execute([$userId]);
$subscriptionId = $stmt->fetchColumn();

if (!$subscriptionId) {
    http_response_code(400);
    exit('No active subscription');
}

\Stripe\Stripe::setApiKey($stripeSecretKey);
try {
    $subscription = \Stripe\Subscription::retrieve($subscriptionId);

    log_subscription('retrieved subscription id=' . $subscriptionId);

    $itemId = $subscription->items->data[0]->id;
    // Estimate proration cost using upcoming invoice
    $invoice = \Stripe\Invoice::upcoming([
        'customer' => $subscription->customer,
        'subscription_details' => [
            'subscription' => $subscriptionId,
            'items' => [
                ['id' => $itemId, 'price' => $priceId]
            ],
            'proration_behavior' => 'create_prorations'
        ]
    ]);
    $amountDue = $invoice->amount_due / 100; // convert from cents

    log_subscription('upcoming invoice amount=' . $amountDue);
} catch (Exception $e) {
    log_subscription('Stripe error in confirm_upgrade: ' . $e->getMessage());
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
