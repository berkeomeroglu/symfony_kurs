<?php
/**
 * Created by PhpStorm.
 * User: berkeomeroglu
 * Date: 2019-03-25
 * Time: 09:30
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testTestMe()
    {
        $client = static::createClient();

        $client->request('GET', '/test-me');

        $crawler = $client->getCrawler();
        $form = $crawler->selectButton('Submit')->form();

        $form['form[name]'] = 'Berke';
        $form['form[password]'] = '123456';
        $crawler = $client->submit($form);

        $crawler->getUri();
    }
}