<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErrorsControllerTest extends WebTestCase
{
    public function testAccessdenied()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/accessDenied');
    }

}
