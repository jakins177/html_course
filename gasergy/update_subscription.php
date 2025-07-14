<?php
session_start();
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
    $itemId = $subscription->items->data[0]->id;
    \Stripe\Subscription::update($subscriptionId, [
        'cancel_at_period_end' => false,
        'items' => [
            ['id' => $itemId, 'price' => $priceId]
        ],
        'proration_behavior' => 'create_prorations'
    ]);
    $stmt = $pdo->prepare("UPDATE users SET subscription_gasergy = ? WHERE id = ?");
    $stmt->execute([$amount, $userId]);
} catch (Exception $e) {
    http_response_code(500);
    exit('Stripe error');
}

header('Location: manage_subscription.php');
