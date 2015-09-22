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
        return $this->render(
            'Order/order.html.twig',
            array('variety' => $request->query->get('variety'))
        );
    }

}
