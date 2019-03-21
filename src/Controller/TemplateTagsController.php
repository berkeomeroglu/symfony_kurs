<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateTagsController extends Controller
{
    /**
     * @Route("/template-tags", name="template-tags")
     * @return Response
     */
    public function index()
    {
        $cityArr = [
            'sehirler' => [
                'Ankara',
                'İstanbul',
                'Eskişehir',
                'Muğla'
            ],
            'status' => true,
            'definedCheck' => 'Defined check degeri',
            'emptyCheck' => '',
            'nullCheck' => null,
            'iterableCheck' => 'a'
        ];

        return $this->render('template-tags/index.html.twig', $cityArr);
    }
}