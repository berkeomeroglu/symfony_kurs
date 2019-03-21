<?php

namespace App\Controller;

use App\Entity\Kontrol;
use App\Form\KontrolType;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KontrolController extends Controller
{
    /**
     * @Route("/form-kontrol")
     */
    public function formKontrol(Request $request)
    {
        $kontrol = new Kontrol();

        $form = $this->createForm(KontrolType::class, $kontrol);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return new Response('Form kontrolden başarıyla geçti');
        }

        if ($form->isSubmitted()) {
            $errors = $form->getErrors(true);

            foreach ($errors as $error) {
                echo $error->getMessage();
                echo '<hr>';
            }

            exit();
        }

        return $this->render('kontrol/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}