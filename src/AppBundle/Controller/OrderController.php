<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Order;

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
            // Prevent XSS and Default to michaels-fav
            // There is likely a more native way of handling this, such as Symfony Forms
            switch($request->query->get('variety')) {
                case 'meatlovers':
                case 'vegetarian':
                case 'michaels-fav':
                    $variety = $request->query->get('variety');
                break;

                default:
                    $variety = 'michaels-fav';
            }

            return $this->render(
                'Order/order.html.twig',
                array('variety' => $variety)
            );
        }

        // POST requests save the Order to the DB
        elseif ($request->getMethod() == 'POST') {
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

            return $this->redirect('/orders');
        }
    }

}
