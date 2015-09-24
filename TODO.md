# TODO

~~* Fix incorrect twig template locations that I pointed out to Thai~~

~~* Read about Symfony Bundles - bundle inheritance is rad!~~




* Extend FOSRestController to create API's
  * `POST  /api/order`              (place order)
  * `GET   /api/orders`             (list orders)
  * `PATCH /api/orders?id=xyz`      (update order status)
    * Queued, Preparing, Cooking, Delivering

* Use Symfony Forms to server-side validation

* Unit test for `POST /api/order`

* Unit test for `GET /api/orders`, `PATCH /api/orders?id=xyz`

* Integrate Backbone.js and Marionette to create an SPA that uses the API's



### Extras

* Read about relationships in `Doctrine`

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
