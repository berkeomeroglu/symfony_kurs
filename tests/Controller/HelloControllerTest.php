<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-25
 * Time: 09:30
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function testHello()
    {
        $client = static::createClient();

        $client->request('GET', '/hello');

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testMerhabaDunya()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        $crawler = $client->getCrawler();

        $this->assertGreaterThan(0, $crawler->filter("html:contains('Mükemmel')")->count());
    }
}