<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomerControllerTest extends WebTestCase
{
    public function testGetCustomer(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/customer/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello john!');
    }
}
