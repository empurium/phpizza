<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Order;

class OrderController extends FOSRestController
{
    /**
     * Get the existing Orders, sorted by id ASC.
     *
     * @param Request $request  the request object
     *
     * @return array Contains status, message, and orders[] list of Orders.
     */
    public function getOrdersAction(Request $request)
    {
        $em     = $this->getDoctrine()->getManager();
        $orders = $em->getRepository('AppBundle:Order')
            ->findAll(array(), array('id', 'ASC'));

        // Return the Orders if any were found
        if ($orders) {
            $view = $this->view(array(
                'status'  => 'success',
                'message' => 'Pizza Orders sorted by ID ASC',
                'orders'  => $orders,
            ), 200);
        }
        else {
            $view = $this->view(array(
                'status'  => 'error',
                'message' => 'Did not find any Orders.',
            ), 500);
        }

        return $this->handleView($view);
    }


    /**
     * Check if the Customer exists based on Last Name/Phone, create if it does not.
     * Then create an Order for delicious pizza for this $customer->id.
     *
     * @param Request $request  the request object
     *
     * @return array Contains status, message, and order_id of created Order.
     */
    public function postOrderAction(Request $request)
    {
        $em          = $this->getDoctrine()->getManager();
        $customers   = $em->getRepository('AppBundle:Customer');

        // Does this customer already exist?
        $customer = $customers->findOneBy(array(
            'lname' => $request->request->get('lname'),
            'phone' => $request->request->get('phone'),
        ));

        // If not, create this customer!
        if (!$customer) {
            $customer = new Customer();
            $customer
                ->setFname($request->request->get('fname'))
                ->setLname($request->request->get('lname'))
                ->setPhone($request->request->get('phone'));

            $em->persist($customer);
            $em->flush();
        }

        // Save the Order for this Customer
        $order = new Order();
        $order
            ->setCustomerId($customer->getId())
            ->setPizzaVariety($request->request->get('variety'))
            ->setToppings($request->request->get('toppings'))
            ->setStatus('Queued');

        $em->persist($order);
        $em->flush();

        // Return the Order ID if it was properly created
        if ($order) {
            $view = $this->view(array(
                'status'   => 'success',
                'message'  => 'Your order has been placed!',
                'order_id' => $order->getId(),
            ), 200);
        }
        else {
            $view = $this->view(array(
                'status'   => 'error',
                'message'  => 'There was an error placing your order.',
            ), 500);
        }

        return $this->handleView($view);
    }


    /**
     * Update the given Order ID's status. Expects ?status=xyz
     * Statuses can be: Queued, Preparing, Cooking, Delivering
     *
     * @param Request $request  the request object
     * @param int     $id       Order ID
     *
     * @return array Contains status, message, and updated order[]
     */
    public function patchOrderAction(Request $request, $id)
    {
        $status = $request->query->get('status');
        $em     = $this->getDoctrine()->getManager();
        $order  = $em->getRepository('AppBundle:Order')->find($id);

        // Save the new Order status
        $order->setStatus($status);
        $em->persist($order);
        $em->flush();

        // Return the Order ID if it was properly created
        if ($order) {
            $view = $this->view(array(
                'status'  => 'success',
                'message' => 'Order status has been updated.',
                'order'   => $order,
            ), 200);
        }
        else {
            $view = $this->view(array(
                'status'   => 'error',
                'message'  => 'There was an error updating the status of this order.',
            ), 500);
        }

        return $this->handleView($view);
    }
}
