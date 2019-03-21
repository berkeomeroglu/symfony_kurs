<?php

namespace App\Controller;

use App\Entity\Gorev;
use App\Form\GorevType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class GorevController extends Controller
{

    /**
     * @Route("/yeni-gorev")
     * @return Response
     * @throws \Exception
     */
    public function new(Request $request)
    {
        $gorev = new Gorev();

        $form = $this->createForm(GorevType::class,$gorev);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($gorev);
            $em->flush();

            return $this->redirectToRoute('app_gorev_list');
        }


        return $this->render('gorev/index.html.twig', [
           'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/gorevler")
     */
    public function list(AuthorizationCheckerInterface $authorizationChecker)
    {
//        if (false === $authorizationChecker->isGranted('ROLE_EDITOR'))
//        {
//            throw new AccessDeniedException('Buraya erişim yetkiniz yok');
//        }

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