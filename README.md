This repository contains a small demo application for buying "Gasergy" credits.
Users can purchase subscription plans via Stripe and manage their plan from the
`gasergy` directory.

## New subscription management

* Users manage their subscriptions directly through the Stripe billing portal
  at `https://billing.stripe.com/p/login/test_00wbJ12SW34q2cK1O10sU00`.
* `gasergy/confirm_upgrade.php` warns users of the prorated charge before the
  subscription is updated.
* `gasergy/update_subscription.php` updates the Stripe subscription and then
  redirects to the Stripe billing portal.
* `gasergy/cancel_subscription.php` sets the subscription to cancel at the end
  of the billing period and redirects to the Stripe billing portal.
* Monthly renewals are processed in `gasergy/webhook.php` when Stripe sends an
  `invoice.payment_succeeded` event. The user receives their plan's Gasergy every month.

* The webhook also listens for `customer.subscription.updated`,
  `customer.subscription.deleted`, `payment_method.attached`,
  `payment_method.detached`, and `customer.updated` events to keep plan and
  payment details in sync when changes occur in the Stripe portal.

* Subscription actions log to `gasergy/subscription.log` for troubleshooting.

