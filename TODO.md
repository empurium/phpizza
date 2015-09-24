# TODO

~~* Fix incorrect twig template locations that I pointed out to Thai~~

~~* Read about Symfony Bundles~~



* Extend FOSRestController to create API's
  * `POST  /api/order`              (place order)
  * `GET   /api/orders`             (list orders)
  * `PATCH /api/orders?id=xyz`      (update order status)
    * Queued, Preparing, Cooking, Delivering

* Integrate Backbone.js and Marionette to create an SPA that uses the API's

* Unit test for `POST /api/order`

* Unit test for `GET /api/orders`, `PATCH /api/orders?id=xyz`

* Use Symfony Forms to server-side validation


### Extras

* Read about `Guzzle`

* Read about `Symfony Events`

* Topping management UI
  * `GET  /api/toppings`                (list)
  * `POST /api/toppings`                (add topping)
  * `DEL  /api/toppings?id=xyz`         (delete topping)

* Customer API's
  * `GET  /api/customers`            (list)
  * `POST /api/customers`            (create a customer)

* Charge $1 per ingredient, show total price

* Use Convox to run it in an AWS test environment
