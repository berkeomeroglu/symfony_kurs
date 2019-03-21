<?php

namespace App\Controller;

use App\Entity\Urun;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class RepositoryController extends Controller
{
    /**
     * @Route("/repository/test/{fiyat}", name="index")
     */
    public function index($fiyat)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $urunRepo = $entityManager->getRepository(Urun::class);

        return $this->render('urun/index.html.twig', [
            'urunler' => $urunRepo->findAllGreateThan($fiyat)
        ]);
    }
}
