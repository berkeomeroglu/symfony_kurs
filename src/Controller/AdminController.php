<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{

    /**
     * @Route("/admin")
     * @return Response
     * @throws \Exception
     */
    public function new(Request $request)
    {
        return new Response("<html><body>Admin Page</body>");
    }
}