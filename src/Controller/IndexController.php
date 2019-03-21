<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render("index/index.html.twig", [
            'controller_name' => 'indexController'
        ]);
    }

    /**
     * @Route("/request", name="request_test")
     * @param RequestStack $requestStack
     * @return JsonResponse
     */
    public function requestTest(RequestStack $requestStack)
    {
        $request = $requestStack->getCurrentRequest();

        // POST
        $postName = $request->request->get('name');

        // GET
        $getName = $request->query->get('name');
        dump($getName);
        exit();

        // COOKIE
        $request->cookies->get('username');

        $request->attributes->get('name');

        // FILES
        $request->files->get("filename");

        // SERVER
        $serverData = $request->server->all();

        return new JsonResponse(["message" => "Merhaba Dünya"]);
    }

    /**
     * @Route("/service-test", name="service-test")
     * @param SessionInterface $session
     * @return Response
     */
    public function serviceTest(SessionInterface $session)
    {
        return new Response($session->getName());
    }
}
