<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use AppBundle\Entity\Topping;

class ToppingController extends FOSRestController
{
    /**
     * Get the existing Toppings, sorted by id ASC.
     *
     * @param Request $request  the request object
     *
     * @return array Contains status, message, and toppings[] alphabetical list of Toppings.
     */
    public function getToppingsAction(Request $request)
    {
        $em       = $this->getDoctrine()->getManager();
        $toppings = $em->getRepository('AppBundle:Topping')
            ->findAll(array(), array('topping', 'ASC'));

        // Return the Toppings if any were found
        if ($toppings) {
            $view = $this->view(array(
                'status'   => 'success',
                'message'  => 'Pizza Toppings listed alphabetically.',
                'toppings' => $toppings,
            ), 200);
        }
        else {
            $view = $this->view(array(
                'status'  => 'error',
                'message' => 'Did not find any Toppings.',
            ), 500);
        }

        return $this->handleView($view);
    }


    /**
     * Create a new Pizza Topping. Make sure they're delicious!
     *
     * @param Request $request  the request object
     *
     * @return array Contains status, message, and topping[] of created Topping.
     */
    public function postToppingAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $toppingName = $request->request->get('topping');
        $toppingKey  = $request->request->get('topping_key');

        // Does this topping_key already exist?
        $topping = $em->getRepository('AppBundle:Topping')->findOneBy(array(
            'toppingKey' => $toppingKey,
        ));

        // If not, create this topping!
        if (!$topping) {
            $topping = new Topping();
            $topping
                ->setTopping($toppingName)
                ->setToppingKey($toppingKey);

            $em->persist($topping);
            $em->flush();

            $view = $this->view(array(
                'status'  => 'success',
                'message' => 'Pizza Topping added successfully.',
                'topping' => $topping,
            ), 200);
        }
        else {
            $view = $this->view(array(
                'status'   => 'error',
                'message'  => 'This topping_key already exists.',
            ), 500);
        }

        return $this->handleView($view);
    }


    /**
     * Delete the given Topping ID.
     *
     * @param Request $request  the request object
     * @param int     $id       Topping ID
     *
     * @return array Contains status, message
     */
    public function deleteToppingAction(Request $request, $id)
    {
        $em      = $this->getDoctrine()->getManager();
        $topping = $em->getRepository('AppBundle:Topping')->find($id);

        // Delete the given Topping
        $em->remove($topping);
        $em->flush();

        $view = $this->view(array(
            'status'  => 'success',
            'message' => 'Pizza Topping successfully deleted.',
        ), 200);

        return $this->handleView($view);
    }
}
