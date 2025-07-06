<?php
$envPath = __DIR__ . '/env.php';
if (file_exists($envPath)) {
    require_once $envPath;
}
// Load Stripe configuration from environment variables.
// Replace placeholders with your actual keys in production or set environment variables.
$stripeSecretKey = getenv('STRIPE_SECRET_KEY') ?: 'sk_test_placeholder';
$stripePublishableKey = getenv('STRIPE_PUBLISHABLE_KEY') ?: 'pk_test_placeholder';
$stripeWebhookSecret = getenv('STRIPE_WEBHOOK_SECRET') ?: 'whsec_placeholder';

// Map Gasergy amounts to Stripe Price IDs.
$gasergyPrices = [
    // Starter – $2.50 for 500 Gasergy
    500    => 'price_500g_placeholder',
    // Professional – $10 for 2 500 Gasergy
    2500   => 'price_2500g_placeholder',
    // Business – $30 for 10 000 Gasergy
    10000  => 'price_10000g_placeholder',
    // Enterprise – $125 for 50 000 Gasergy
    50000  => 'price_50000g_placeholder',
];

function priceForGasergy(int $amount): ?string {
    global $gasergyPrices;
    return $gasergyPrices[$amount] ?? null;
}
