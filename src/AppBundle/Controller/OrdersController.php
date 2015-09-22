<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Order;

class OrdersController extends Controller
{
    /**
     * @Route("/orders")
     * @Template()
     */
    public function ordersAction(Request $request)
    {
        // GET requests simply show the Place Order page
        if ($request->getMethod() == 'GET') {
            $em     = $this->getDoctrine()->getManager();
            $orders = $em->getRepository('AppBundle:Order')
                ->findAll(array(), array('id', 'ASC'));

            return $this->render(
                'Orders/orders.html.twig',
                array('orders' => $orders)
            );
        }

        // PUT requests update the status of an Order
        elseif ($request->getMethod() == 'PUT') {

        }
    }
}
