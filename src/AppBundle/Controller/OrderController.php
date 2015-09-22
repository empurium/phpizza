<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OrderController extends Controller
{
    /**
     * @Route("/order")
     * @Template()
     */
    public function orderAction()
    {
        return array(
            // ...
        );
    }

}
