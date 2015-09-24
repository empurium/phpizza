<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestControllerTest extends WebTestCase
{
    public function testGetRest()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/rest.json');
        $response = $client->getResponse();

        // ensure 200 status code from request
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // ensure hardcoded value response
        $this->assertEquals('{"hi":"guys"}', $response->getContent());
    }
}
