<?php

namespace App\Controller;

use App\SiparisEvents;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SiparisController extends AbstractController
{
    /**
     * @param EventDispatcherInterface $dispatcher
     * @Route("/siparis-ver", name="siparis-ver")
     * @return Response
     */
    public function index(EventDispatcherInterface $dispatcher, Request $request)
    {
        $urun = $request->get("urun");

        if (empty($urun))
        {
            throw new NotFoundHttpException("Ürün Bulunamadı");
        }

        // Urunun siparis edildiğini duyuralım.
        $dispatcher->dispatch(SiparisEvents::KAYDEDILDI, new SiparisEvents($urun));

        return new Response((sprintf("Urun siparisiniz kaydedildi, urun: %s", $urun)));
    }
}