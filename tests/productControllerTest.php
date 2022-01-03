<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase {

    public function testIndex(){

        $client = static::createClient();
        $client->request('GET', '/products');
        $this->assertResponseStatusCodeSame(200);
        $this->assertSelectorTextContains('p', 'Title: prod1');
    }
}