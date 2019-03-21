<?php

namespace App\Controller;

use App\Entity\Urun;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UrunController extends AbstractController
{
    /**
     * @Route("/urunler", name="urun_index")
     */
    public function index()
    {
        $urunRepository = $this->getDoctrine()->getRepository(Urun::class);

        $urunler = $urunRepository->findAll();
        $params = ['urunler' => $urunler];

        return $this->render('urun/index.html.twig', $params);
    }

    /**
     * @Route("/urunler/create", name="urun_create")
     */
    public function create()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $urun = new Urun();

        $urun->setIsim("Regular Gömlek")
            ->setAciklama('Koton Gömlek')
            ->setPrice(100);

        $entityManager->persist($urun);

        $entityManager->flush();

        return new Response(sprintf('Urun başarı ile oluşturuldu id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/{id}", name="urun_show")
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $entityRepository = $this->getDoctrine()->getRepository(Urun::class);

        $urun = $entityRepository->find($id);

        return new Response(sprintf("Urun başarı ile alındı. Ürün ismi:%s", $urun->getIsim()));
    }

    /**
     * @Route("/urunler/update/{id}", name="urun_update")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityRepo = $entityManager->getRepository(Urun::class);

        $urun = $entityRepo->find($id);

        $urun->setIsim("Ormancı Gömlek Güncel");

        $entityManager->persist($urun);

        $entityManager->flush();

        return $this->redirectToRoute("urun_show", array('id' => $urun->getId()));
    }

    /**
     * @Route("/urun/delete/{id}", name="urun_delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityRepo = $entityManager->getRepository(Urun::class);

        $urun = $entityRepo->find($id);
        $entityManager->remove($urun);

        $entityManager->flush();

        return $this->redirectToRoute('urun_index');
    }
}
