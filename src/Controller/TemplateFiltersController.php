<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateFiltersController extends AbstractController
{
    /**
     * @Route("/template-filters", name="template-filters")
     */
    public function index()
    {
        $params = [
            'negativeVar' => -25,
            'sentence' => 'merhaba ben berke',
            'today' => new \DateTime(),
            'sehirler' => [
                'Eskişehir',
                'Aksaray',
                'Erzurum',
            ],
            'rawData' => '<h3>Selam Dünya</h3>'
        ];

        return $this->render('template-filters/index.html.twig', $params);
    }
}