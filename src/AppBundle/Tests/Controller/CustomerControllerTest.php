<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomerControllerTest extends WebTestCase
{
    public function testPostCustomer()
    {
        $client = static::createClient();

        $random = rand();
        $crawler  = $client->request('POST', '/api/customers.json', array(
            'fname' => 'Guy',
            'lname' => "Ritchie-{$random}",
            'phone' => '888-555-1212',
        ));

        $response = $client->getResponse();
        $resData  = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($resData->status, 'success');

        $this->assertGreaterThan(0, $resData->customer->id);
    }

    public function testGetCustomer()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/api/customers.json');
        $response = $client->getResponse();
        $resData  = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $this->assertEquals($resData->status, 'success');

        $this->assertGreaterThan(0, count($resData->customers));
    }
}
