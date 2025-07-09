<?php
session_start();

$autoload = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoload)) {
    error_log("Missing Stripe autoload at $autoload");
    http_response_code(500);
    exit('Server misconfiguration: dependencies not installed');
}
require_once $autoload;

require_once __DIR__ . '/../config/stripe.php';

$logFile = __DIR__ . '/checkout.log';
function log_checkout($msg) {
    global $logFile;
    file_put_contents($logFile, date('c') . ' ' . $msg . PHP_EOL, FILE_APPEND);
}
log_checkout('start user=' . ($_SESSION['user_id'] ?? 'none') . ' amount=' . ($_POST['amount'] ?? ''));

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit('Unauthorized');
}

$amount = intval($_POST['amount'] ?? 0);
$priceId = priceForGasergy($amount);
if ($amount <= 0 || !$priceId) {
    log_checkout("invalid amount " . $amount);
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
    log_checkout("session created " . $session->id);
    exit;
} catch (Exception $e) {
    log_checkout("error: " . $e->getMessage());
    http_response_code(500);
    echo 'Error creating checkout session';
}
