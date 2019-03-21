<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends Controller
{
    /**
     * @Route("/template", name="template")
     * @return Response
     */
    public function index()
    {
        return $this->render('template/index.html.twig');
    }
}