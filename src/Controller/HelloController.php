<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends Controller
{
    /**
     * @Route("hello")
     * @return Response
     */
    public function hello()
    {
        $messageGenerator = $this->container->get('message.generator');
        $session = $this->container->get('session');

        return new Response($messageGenerator->helloMessage(). '---'. $session->getName());
    }

    /**
     * @Route("/merhaba-dunya")
     */
    public function merhabaDunya()
    {
        return new Response("Merhaba Dünya! Mükemmel bir güne uyandık!");
    }
}