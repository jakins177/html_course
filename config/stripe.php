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
// The checkout form posts the amount of Gasergy the user wants to buy, so the
// mapping keys must be the numeric amounts rather than plan names.
$gasergyPrices = [
    // Starter – $2.50 for 500 Gasergy
    500    => 'price_1RcBfNGUmegTY8R1cATII8Yy',
    // Professional – $10 for 2 500 Gasergy
    2500   => 'price_1RcBfNGUmegTY8R1gZsObwZO',
    // Business – $30 for 10 000 Gasergy
    10000  => 'price_1RcBfNGUmegTY8R13ub5OXoC',
    // Enterprise – $125 for 50 000 Gasergy
    50000  => 'price_1RcBfNGUmegTY8R1HjuXKFzH',
];

function priceForGasergy(int $amount): ?string {
    global $gasergyPrices;
    return $gasergyPrices[$amount] ?? null;
}
function gasergyForPrice(string $priceId): ?int {
    global $gasergyPrices;
    $lookup = array_flip($gasergyPrices);
    return $lookup[$priceId] ?? null;
}
