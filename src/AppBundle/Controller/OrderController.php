<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OrderController extends Controller
{
    /**
     * @Route("/order")
     * @Template()
     */
    public function orderAction(Request $request)
    {
        // GET requests simply show the Place Order page
        if ($request->getMethod() == 'GET') {
            return $this->render(
                'Order/order.html.twig',
                array('variety' => $request->query->get('variety'))
            );
        }

        // POST requests save the Order to the DB
        elseif ($request->getMethod() == 'POST') {
            
        }
    }

}
