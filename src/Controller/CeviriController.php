<?php

namespace App\Controller;

use App\Entity\Gorev;
use App\Form\GorevType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

class CeviriController extends Controller
{

    /**
     * @Route("/ceviri")
     * @return Response
     * @throws \Exception
     */
    public function ceviri(TranslatorInterface $translator)
    {
        $message = $translator->trans('hello.user');
        return new Response($message);
    }

    /**
     * @Route("/ceviri-listesi")
     */
    public function list(LoggerInterface $logger)
    {
        $em = $this->getDoctrine()->getManager();

        $gorevler = $em->getRepository(Gorev::class)->findAll();

        return $this->render('gorev/list.html.twig', [
            'gorevler' => $gorevler
        ]);
    }

    /**
     * @Route("/gorevler/sil/{id}")
     */
    public function remove(Gorev $gorev, Request $request)
    {
        $token = $request->request->get('token');

        if ($this->isCsrfTokenValid('gorev-sil', $token)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gorev);
            $em->flush();
         }

        return $this->redirectToRoute('app_gorev_list');
    }
}