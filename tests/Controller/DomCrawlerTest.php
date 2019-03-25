<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-25
 * Time: 09:30
 */

namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DomCrawlerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $crawler = $client->getCrawler();

        $newCrawler = $crawler->filter('input[type="submit"]')
            ->last()
            ->parents()
            ->first();

        // css erişim
        $newCrawler->filter('h1.span');

        // 3.elemana erişim
        $crawler->eq(3);

        // ilk objeyi ve son objeyi alma
        $crawler->first();
        $crawler->last();

        // yan dom bağlarını alma
        $crawler->siblings();

        $crawler->nextAll();

        $crawler->previousAll();

        $crawler->parents();

        $crawler->children();

        $trNode = $crawler->filter('tr');

        $countTrNode = count($trNode);

        // class attr a sahip olanlar
        $crawler->attr('class');

        $content = $crawler->text();

        var_dump($content); exit();
    }
}