<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use AppBundle\Entity\Customer;

class CustomerController extends FOSRestController
{
    /**
     * Get the existing Customers, sorted by fname ASC.
     *
     * @param Request $request  the request object
     *
     * @return array Contains status, message, and customers[] alphabetical list of Customers.
     */
    public function getCustomersAction(Request $request)
    {
        $em        = $this->getDoctrine()->getManager();
        $customers = $em->getRepository('AppBundle:Customer')
            ->findAll(array(), array('fname', 'ASC'));

        // Return the Customers if any were found
        if ($customers) {
            $view = $this->view(array(
                'status'   => 'success',
                'message'  => 'Customers listed alphabetically.',
                'customers' => $customers,
            ), 200);
        }
        else {
            $view = $this->view(array(
                'status'  => 'error',
                'message' => 'Did not find any Customers.',
            ), 500);
        }

        return $this->handleView($view);
    }


    /**
     * Create a new Customer. If the customer already exists (unique by lname/phone), it will
     * not be created, and the existing Customer will be returned.
     *
     * @param Request $request  the request object
     *
     * @return array Contains status, message, and customer[] of created Customer.
     */
    public function postCustomerAction(Request $request)
    {
        $em        = $this->getDoctrine()->getManager();
        $customers = $em->getRepository('AppBundle:Customer');

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

        // Return the Customer
        $view = $this->view(array(
            'status'   => 'success',
            'message'  => 'Customer successfully created.',
            'customer' => $customer,
        ), 200);

        return $this->handleView($view);
    }
}
