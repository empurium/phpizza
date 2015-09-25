<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    public function testPostOrder()
    {
        $client = static::createClient();

        $crawler  = $client->request('POST', '/api/orders.json', array(
            'fname'    => 'Test First',
            'lname'    => 'Test Last',
            'phone'    => '555-555-1234',
            'variety'  => 'vegetarian',
            'toppings' => array('green-olives', 'pepperonis', 'mushrooms'),
        ));

        $response = $client->getResponse();
        $order    = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($order->status, 'success');

        $this->assertGreaterThan(0, $order->order_id);
    }

    public function testGetOrder()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/api/orders.json');
        $response = $client->getResponse();
        $orders   = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($orders->status, 'success');

        $this->assertGreaterThan(0, count($orders->orders));
    }
}
