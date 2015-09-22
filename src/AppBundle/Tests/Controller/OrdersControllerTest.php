<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrdersControllerTest extends WebTestCase
{
    public function testOrders()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/orders');
    }

}
