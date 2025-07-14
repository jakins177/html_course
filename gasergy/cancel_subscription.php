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
log_subscription('cancel_subscription start user=' . ($_SESSION['user_id'] ?? 'none'));


if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit('Unauthorized');
}

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
    \Stripe\Subscription::update($subscriptionId, ['cancel_at_period_end' => true]);

    log_subscription('set cancel_at_period_end for ' . $subscriptionId);
} catch (Exception $e) {
    log_subscription('Stripe error canceling ' . $subscriptionId . ': ' . $e->getMessage());

    http_response_code(500);
    exit('Stripe error');
}

header('Location: manage_subscription.php');
