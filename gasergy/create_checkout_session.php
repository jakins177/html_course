<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../auth-system/config/db.php';
require_once __DIR__ . '/../config/stripe.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit('Unauthorized');
}

$amount = intval($_POST['amount'] ?? 0);
$priceId = priceForGasergy($amount);
if ($amount <= 0 || !$priceId) {
    http_response_code(400);
    exit('Invalid amount');
}

\Stripe\Stripe::setApiKey($stripeSecretKey);

try {
    $session = \Stripe\Checkout\Session::create([
        'mode' => 'subscription',
        'line_items' => [[
            'price' => $priceId,
            'quantity' => 1,
        ]],
        'success_url' => '/gasergy/success.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url'  => '/gasergy/get.php',
        'client_reference_id' => $_SESSION['user_id'],
        'metadata' => ['amount' => $amount],
    ]);
    header('Location: ' . $session->url, true, 303);
    exit;
} catch (Exception $e) {
    http_response_code(500);
    echo 'Error creating checkout session';
}
