<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/stripe.php';
require_once __DIR__ . '/../auth-system/config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /auth-system/frt_login.php');
    exit;
}

$uid = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT stripe_subscription_id FROM users WHERE id = ?");
$stmt->execute([$uid]);
$userSub = $stmt->fetchColumn();

\Stripe\Stripe::setApiKey($stripeSecretKey);
$subscription = null;
if ($userSub) {
    try {
        $subscription = \Stripe\Subscription::retrieve($userSub);
    } catch (Exception $e) {
        $subscription = null;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Subscription</title>
</head>
<body>
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
    <form action="update_subscription.php" method="POST">
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
