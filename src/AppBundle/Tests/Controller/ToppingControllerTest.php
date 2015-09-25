<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ToppingControllerTest extends WebTestCase
{
    private static $topping_id;

    public function testPostTopping()
    {
        $client = static::createClient();

        $random = rand();
        $crawler  = $client->request('POST', '/api/toppings.json', array(
            'topping'     => 'Pepperonis',
            'topping_key' => "pepperonis-${random}",
        ));

        $response = $client->getResponse();
        $resData  = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($resData->status, 'success');

        $this->assertGreaterThan(0, $resData->topping->id);

        self::$topping_id = $resData->topping->id;
    }

    public function testGetOrder()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/api/toppings.json');
        $response = $client->getResponse();
        $resData  = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($resData->status, 'success');

        $this->assertGreaterThan(0, count($resData->toppings));
    }

    public function testDeleteOrder()
    {
        $client = static::createClient();

        $crawler  = $client->request('DELETE', '/api/toppings/' . self::$topping_id);
        $response = $client->getResponse();
        $resData  = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($resData->status, 'success');

        $this->assertEquals($resData->message, 'Pizza Topping successfully deleted.');
    }
}
