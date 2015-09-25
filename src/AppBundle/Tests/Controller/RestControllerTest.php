<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestControllerTest extends WebTestCase
{
    public function testGetRest()
    {
        $client = static::createClient();

        $crawler  = $client->request('GET', '/api/rest.json');
        $response = $client->getResponse();

        // ensure 200 status code from request
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // ensure hardcoded value response
        $this->assertEquals('{"hi":"guys"}', $response->getContent());
    }

    public function testPostRest()
    {
        $client = static::createClient();

        $crawler  = $client->request('POST', '/api/rests.json');
        $response = $client->getResponse();

        // ensure 200 status code from request
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // ensure hardcoded value response
        $this->assertEquals('{"status":"posted"}', $response->getContent());
    }

    public function testPatchRest()
    {
        $client = static::createClient();

        $crawler  = $client->request('PATCH', '/api/rest.json');
        $response = $client->getResponse();

        // ensure 200 status code from request
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        // ensure hardcoded value response
        $this->assertEquals('{"status":"patched"}', $response->getContent());
    }
}
