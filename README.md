This repository contains a small demo application for buying "Gasergy" credits.
Users can purchase subscription plans via Stripe and manage their plan from the
`gasergy` directory.

## New subscription management

* `gasergy/manage_subscription.php` shows the current plan, allows upgrading or
  downgrading, and provides a cancel button. Upgrade messages display based on
  the result of the last change.
* `gasergy/confirm_upgrade.php` warns users of the prorated charge before the
  subscription is updated and logs any Stripe errors.
* `gasergy/update_subscription.php` updates the Stripe subscription and
  redirects back with a success or pending status depending on whether the
  invoice was paid.
* `gasergy/update_payment.php` opens the Stripe billing portal so a user can
  update their payment method if a charge fails and logs failures.
* `gasergy/cancel_subscription.php` sets the subscription to cancel at the end
  of the billing period.
* Monthly renewals are processed in `gasergy/webhook.php` when Stripe sends an
  `invoice.paid` event. The user receives their plan's Gasergy every month.

* Subscription actions log to `gasergy/subscription.log` for troubleshooting.

