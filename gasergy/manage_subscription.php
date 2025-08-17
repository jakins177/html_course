<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/manage_subscription.log');

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/stripe.php';
require_once __DIR__ . '/../auth-system/config/db.php';

function log_subscription($msg) {
    error_log($msg);
}

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
$upcomingInvoice = null;
if ($userSub) {
    try {
        $subscription = \Stripe\Subscription::retrieve($userSub);

        log_subscription('Stripe subscription retrieved id=' . $userSub);

        try {
            $upcomingInvoice = \Stripe\Invoice::createPreview([
                'customer'     => $subscription->customer,
                'subscription' => $subscription->id,
            ]);
            log_subscription('Upcoming invoice preview retrieved for subscription=' . $subscription->id);
        } catch (Exception $e) {
            log_subscription('Stripe error retrieving upcoming invoice preview for ' . $userSub . ': ' . $e->getMessage());
            $upcomingInvoice = null;
        }
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

    $nextBilling = null;
    if (!$subscription->cancel_at_period_end && $upcomingInvoice) {
        $timestamp = $upcomingInvoice->next_payment_attempt ?? $upcomingInvoice->period_end ?? null;
        if ($timestamp) {
            $nextBilling = gmdate('Y-m-d', $timestamp);
        }
    }
    ?>
    <p>Current plan: <?php echo $currentGasergy ? htmlspecialchars(number_format($currentGasergy)) . ' Gasergy/month' : 'Unknown'; ?></p>
    <p>Status: <?php echo $status; ?></p>
    <?php if ($nextBilling): ?>
        <p>Next billing date: <?php echo $nextBilling; ?></p>
    <?php endif; ?>
    <h2>Change Plan</h2>
    <form action="confirm_upgrade.php" method="POST">
        <select name="amount">
            <option value="500">Starter - 500 Gasergy/month</option>
            <option value="2500">Professional - 2,500 Gasergy/month</option>
            <option value="10000">Business - 10,000 Gasergy/month</option>
            <option value="50000">Enterprise - 50,000 Gasergy/month</option>
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
