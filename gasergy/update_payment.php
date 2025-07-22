<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/update_payment.log');

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/stripe.php';
require_once __DIR__ . '/../auth-system/config/db.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit('Unauthorized');
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
    $customerId = $subscription->customer;
    $session = \Stripe\BillingPortal\Session::create([
        'customer' => $customerId,
        'return_url' => '/gasergy/manage_subscription.php'
    ]);
    header('Location: ' . $session->url);
    exit;
} catch (Exception $e) {
    http_response_code(500);
    exit('Stripe error');
}
