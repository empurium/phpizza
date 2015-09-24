<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Order;

class RestController extends FOSRestController
{
    /**
     * 
     */
    public function getRestAction(Request $request)
    {
        $view = $this->view(array('hi' => 'guys'), 200);

        return $this->handleView($view);
    }

    /**
     * 
     */
    public function postRestAction(Request $request)
    {
        $view = $this->view(array('status' => 'posted'), 200);

        return $this->handleView($view);
    }

    /**
     * 
     */
    public function patchRestAction(Request $request)
    {
        $view = $this->view(array('status' => 'patched'), 200);

        return $this->handleView($view);
    }

}
