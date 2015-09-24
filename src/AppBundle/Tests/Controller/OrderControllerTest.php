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

        // There is most certainly a better way to clean up JSON responses for
        // json_decode(). Here's some manual work because json_decode() doesn't
        // like $response->getContent() output.
        $resData  = preg_replace('/^"/', '', $response->getContent());
        $resData  = preg_replace('/"$/', '', $resData);
        $resData  = preg_replace('/\\\"/', '"', $resData);

        // ensure 200 status code from request
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // ensure hardcoded value response
        $order = json_decode($resData);
        $this->assertEquals($order->{"status"}, 'success');
    }
}
