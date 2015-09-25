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

        $view = $this->view(array(
            'status'  => 'success',
            'message' => 'Pizza Orders sorted by ID ASC',
            'orders'  => $orders,
        ), 200);

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

        $res = array();
        if ($order) {
            $res = array(
                'status'   => 'success',
                'message'  => 'Your order has been placed!',
                'order_id' => $order->getId(),
            );
            $view = $this->view($res, 200);
        }
        else {
            $res = array(
                'status'   => 'error',
                'message'  => 'There was an error placing your order.',
            );
            $view = $this->view($res, 500);
        }

        return $this->handleView($view);
    }
}
