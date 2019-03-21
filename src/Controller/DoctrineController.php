<?php

namespace App\Controller;

use App\Entity\Grup;
use App\Entity\Kategori;
use App\Entity\Urun;
use App\Entity\User;
use App\Repository\UrunRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineController extends Controller
{
    /**
     * @Route("/saf-sql")
     * @return Response
     */
    public function safSql()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $urunRepo = $entityManager->getRepository(Urun::class);

        $sql = "SELECT * FROM urun LIMIT 5";

        $statement = $entityManager->getConnection()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        dump($result);
        exit();
    }

    /**
     * @Route("/bind-saf-sql")
     */
    public function bindSafSql()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $sql = "SELECT * FROM urun WHERE performans > :performans";
        $statement = $entityManager->getConnection()->prepare($sql);

        $statement->bindValue('performans', 8);
        $statement->execute();

        $result = $statement->fetchAll();

        dump($result); exit();

    }


    /**
     * @Route("/many-to-one-veri-kaydetme")
     */
    public function manyToOneVeriKaydetme()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $kategori = new Kategori();
        $kategori->setIsim("Spor Giyim");

        $urun = new Urun();
        $urun->setIsim("Spor Ayakkabısı");
        $urun->setPrice(100);
        $urun->setKategori($kategori);

        $urun1 = new Urun();
        $urun1->setIsim("Esofman");
        $urun1->setPrice(50);
        $urun1->setKategori($kategori);

        $urun2 = new Urun();
        $urun2->setIsim('Spor Atlet');
        $urun2->setPrice(70);
        $urun2->setKategori($kategori);

        $entityManager->persist($kategori);
        $entityManager->persist($urun);
        $entityManager->persist($urun1);
        $entityManager->persist($urun2);
        $entityManager->flush();

        return new Response(sprintf("Urun kaydedildi. Urun id: %s  Kategori id: %s", $urun->getId(), $kategori->getId()));
    }

    /**
     * @Route("/many-to-one-veri-inceleme/{id}")
     */
    public function manyToOneVeriInceleme(Urun $urun)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $kategori = $urun->getKategori();

        return new Response(sprintf('Urun id: %s  &  Kategori isim: %s', $urun->getId(), $kategori->getIsim()));
    }

    /**
     * @Route("/one-to-many-veri-inceleme/{id}")
     * @param Kategori $kategori
     * @return Response
     */
    public function oneToManyVeriInceleme(Kategori $kategori)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $urunler = $kategori->getUrunler();

        foreach ($urunler as $urun) {
            echo $urun->getIsim();
            echo '<hr>';
        }

        return new Response('');
    }

    /**
     * @Route("/relation-query-builder-inceleme/{id}")
     */
    public function relationQueryBuilder(Kategori $kategori)
    {
        $em = $this->getDoctrine()->getManager();
        $urunRepo = $em->getRepository(Urun::class);
        $urunler = $urunRepo->findByCategory($kategori);

        foreach ($urunler as $urun) {
            echo $urun->getIsim(). '<hr>';
        }

        return new Response("");
    }

    /**
     * @Route("/many-to-many-veri-kaydetme")
     */
    public function manyToManyVeriKaydetme()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user1 = new User();
        $user1->setIsim('Berke');
        $user1->setUsername('berkeomeroglu');

        $user2 = new User();
        $user2->setIsim('Selim');
        $user2->setUsername('selimyavuz');

        $user3 = new User();
        $user3->setIsim('Ayda');
        $user3->setUsername('aydapinarli');

        $group1 = new Grup();
        $group1->setIsim('Admin');

        $group2 = new Grup();
        $group2->setIsim('Operator');

        $group1->addUser($user1);
        $group1->addUser($user2);

        $group2->addUser($user2);
        $group2->addUser($user3);

        $entityManager->persist($user1);
        $entityManager->persist($user2);
        $entityManager->persist($user3);
        $entityManager->persist($group1);
        $entityManager->persist($group2);

        $entityManager->flush();

        return new Response("");
    }
}