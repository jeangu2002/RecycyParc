<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FactureControllerTest extends WebTestCase
{
    public function testGenerate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'generatefacture');
    }

}
