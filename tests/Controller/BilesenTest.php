<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-25
 * Time: 09:30
 */

namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BilesenTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        //history
        $history = $client->getHistory();

        //cookies
        $cookie = $client->getCookieJar();

        //request
        $request = $client->getRequest();

        //response
        $response = $client->getResponse();

        //Crawler
        $crawler = $client->getCrawler();

        $container = $client->getContainer();

        //logger
        $logger = $container->getParameter('env(DATABASE_URL)');

        $this->assertTrue(true);
    }
}