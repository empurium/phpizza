<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    public function testPostRest()
    {
        $client = static::createClient();

        $crawler  = $client->request('POST', '/orders.json', array(
            'fname' => 'Test First',
            'lname' => 'Test Last',
            'phone' => '555-555-1234',
            'variety' => 'vegetarian',
            'toppings' => array('green-olives', 'mushrooms'),
        ));
        $response = $client->getResponse();
        print($response->getContent());

        // ensure 200 status code from request
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // ensure hardcoded value response
        $order = json_decode($response->getContent(), true);
        $this->assertEquals($order["status"], 'success');
    }
}
