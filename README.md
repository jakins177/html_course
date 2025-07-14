This repository contains a small demo application for buying "Gasergy" credits.
Users can purchase subscription plans via Stripe and manage their plan from the
`gasergy` directory.

## New subscription management

* `gasergy/manage_subscription.php` shows the current plan, allows upgrading or
  downgrading, and provides a cancel button.
* `gasergy/update_subscription.php` updates the Stripe subscription.
* `gasergy/cancel_subscription.php` sets the subscription to cancel at the end
  of the billing period.
* Monthly renewals are processed in `gasergy/webhook.php` when Stripe sends an
  `invoice.paid` event. The user receives their plan's Gasergy every month.
* Subscription actions log to `gasergy/subscription.log` for troubleshooting.

