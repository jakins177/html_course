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
log_subscription('manage_subscription start user=' . ($_SESSION['user_id'] ?? 'none'));

if (!isset($_SESSION['user_id'])) {
    header('Location: /auth-system/frt_login.php');
    exit;
}

$uid = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT stripe_subscription_id FROM users WHERE id = ?");
$stmt->execute([$uid]);
$userSub = $stmt->fetchColumn();

log_subscription('db subscription id=' . ($userSub ?: 'none') . ' for user=' . $uid);


\Stripe\Stripe::setApiKey($stripeSecretKey);
$subscription = null;
if ($userSub) {
    try {
        $subscription = \Stripe\Subscription::retrieve($userSub);

        log_subscription('Stripe subscription retrieved id=' . $userSub);
    } catch (Exception $e) {
        log_subscription('Stripe error retrieving ' . $userSub . ': ' . $e->getMessage());
        $subscription = null;
    }
} else {
    log_subscription('no subscription id for user=' . $uid);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Subscription</title>
</head>
<body>
<?php if (isset($_GET['update'])): ?>
    <?php if ($_GET['update'] === 'success'): ?>
        <p style="color:green;">Upgrade successful and invoice paid.</p>
    <?php elseif ($_GET['update'] === 'pending'): ?>
        <p style="color:orange;">Subscription updated but payment is pending.</p>
    <?php else: ?>
        <p style="color:red;">Upgrade failed. <a href="update_payment.php">Update your payment information</a> and try again.</p>
    <?php endif; ?>
<?php endif; ?>
<h1>Your Gasergy Subscription</h1>
<?php if ($subscription): ?>
    <?php
    $item = $subscription->items->data[0];
    $currentPriceId = $item->price->id;
    $currentGasergy = gasergyForPrice($currentPriceId);
    $status = htmlspecialchars($subscription->status);
    $nextBilling = date('Y-m-d', $subscription->current_period_end);
    ?>
    <p>Current plan: <?php echo htmlspecialchars(number_format($currentGasergy)); ?> Gasergy/month</p>
    <p>Status: <?php echo $status; ?></p>
    <p>Next billing date: <?php echo $nextBilling; ?></p>
    <h2>Change Plan</h2>
    <form action="confirm_upgrade.php" method="POST">
        <select name="amount">
            <option value="500">Starter - 500 Gasergy/month</option>
            <option value="2500">Professional - 2 500 Gasergy/month</option>
            <option value="10000">Business - 10 000 Gasergy/month</option>
            <option value="50000">Enterprise - 50 000 Gasergy/month</option>
        </select>
        <button type="submit">Update</button>
    </form>
    <form action="cancel_subscription.php" method="POST" style="margin-top:1em;">
        <button type="submit">Cancel Subscription</button>
    </form>
<?php else: ?>
    <p>You have no active subscription.</p>
    <p><a href="get.php">Purchase a plan</a></p>
<?php endif; ?>
</body>
</html>
