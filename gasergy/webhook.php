<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../auth-system/config/db.php';
require_once __DIR__ . '/../config/stripe.php';

$payload = @file_get_contents('php://input');
$sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

try {
    $event = \Stripe\Webhook::constructEvent(
        $payload,
        $sigHeader,
        $stripeWebhookSecret
    );
} catch (Exception $e) {
    http_response_code(400);
    exit('Invalid signature');
}

if ($event->type === 'checkout.session.completed') {
    $session = $event->data->object;
    $userId = $session->client_reference_id;
    $amount = intval($session->metadata->amount ?? 0);

    if ($userId && $amount > 0) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET gasergy_balance = gasergy_balance + ? WHERE id = ?");
            $stmt->execute([$amount, $userId]);
        } catch (Exception $e) {
            // log error in real setup
        }
    }
}

http_response_code(200);
