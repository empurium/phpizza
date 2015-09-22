# TODO

* PUT /orders?id=xyz to update the status of an order from a drop-down
(Queued, Preparing, Cooking, Delivering)

* Extend FOSRestController to create API's
  * `GET /api/orders`              (list orders)
  * `PUT  /api/orders?id=xyz`       (update order status)
  * `POST /api/order`               (place order)

* Integrate Backbone.js and Marionette to create an SPA that uses the API's

* Unit test for GET order, POST order

* Unit test for GET orders, PUT orders?id=xyz

* Topping management UI

* Charge $1 per ingredient, show total price

* Use Convox to run it in an AWS test environment
