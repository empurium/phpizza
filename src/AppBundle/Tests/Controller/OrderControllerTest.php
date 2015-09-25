<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    public function testGetOrder()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/orders.json');
        $response = $client->getResponse();

        // There is most certainly a better way to clean up JSON responses for
        // json_decode(). Here's some manual work because json_decode() doesn't
        // like $response->getContent() output.
        $resData  = preg_replace('/^"/', '', $response->getContent());
        $resData  = preg_replace('/"$/', '', $resData);
        $resData  = preg_replace('/\\\"/', '"', $resData);
        $orders   = json_decode($resData, true);
        var_dump($resData);

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // $this->assertEquals($orders->{"status"}, 'success');

        // $this->assertGreaterThan($order->{"order_id"}, 0);
    }

    public function testPostOrder()
    {
        $client = static::createClient();

        $crawler  = $client->request('POST', '/orders.json', array(
            'fname'    => 'Test First',
            'lname'    => 'Test Last',
            'phone'    => '555-555-1234',
            'variety'  => 'vegetarian',
            'toppings' => array('green-olives', 'pepperonis', 'mushrooms'),
        ));
        $response = $client->getResponse();

        // There is most certainly a better way to clean up JSON responses for
        // json_decode(). Here's some manual work because json_decode() doesn't
        // like $response->getContent() output.
        $resData  = preg_replace('/^"/', '', $response->getContent());
        $resData  = preg_replace('/"$/', '', $resData);
        $resData  = preg_replace('/\\\"/', '"', $resData);
        $order    = json_decode($resData);

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($order->{"status"}, 'success');

        $this->assertGreaterThan(0, $order->{"order_id"});
    }
}
