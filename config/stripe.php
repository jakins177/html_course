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
    // Monthly plans – 50% off
    500    => 'price_1SKVlTGUmegTY8R1FHmq0vrX',   // Starter: 500 Gasergy / month
    2500   => 'price_1SKVmwGUmegTY8R1MGrmNepB',   // Professional: 2 500 Gasergy / month
    10000  => 'price_1SKVovGUmegTY8R1P74YtVeu',   // Business: 10 000 Gasergy / month
    50000  => 'price_1SKVrhGUmegTY8R1yImCG1E4',   // Enterprise: 50 000 Gasergy / month
    // Annual plans – 50% off
    5000   => 'price_1SKVzSGUmegTY8R1aYyDHHJE',   // Starter: 5 000 Gasergy / year
    20500  => 'price_1SKW1fGUmegTY8R1BVg66Gwv',   // Professional: 20 500 Gasergy / year
    100000 => 'price_1SKW4pGUmegTY8R18xzvt6iG',   // Business: 100 000 Gasergy / year
    500000 => 'price_1SKW7wGUmegTY8R16VrIHmKw',   // Enterprise: 500 000 Gasergy / year
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
