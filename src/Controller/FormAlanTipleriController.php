<?php

namespace App\Controller;

use App\Entity\Gorev;
use App\Form\AlanTipleriType;
use App\Form\GorevType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormAlanTipleriController extends Controller
{

    /**
     * @Route("/form-alan-tipleri")
     * @return Response
     * @throws \Exception
     */
    public function new(Request $request)
    {
        $form = $this->createForm(AlanTipleriType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $formData = $request->request->all();
            dump($formData);
            exit();
            $em->persist($gorev);
            $em->flush();

            return $this->redirectToRoute('app_gorev_list');
        }


        return $this->render('gorev/index.html.twig', [
           'form' => $form->createView()
        ]);
    }
}