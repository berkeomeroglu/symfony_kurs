<?php

namespace App\Repository;

use App\Entity\Kategori;
use App\Entity\Urun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Urun|null find($id, $lockMode = null, $lockVersion = null)
 * @method Urun|null findOneBy(array $criteria, array $orderBy = null)
 * @method Urun[]    findAll()
 * @method Urun[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrunRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Urun::class);
    }

    public function findAllGreateThan(int $price)
    {
        $qb = $this->createQueryBuilder('u')
            ->andWhere('u.price > :price')
            ->setParameter('price', $price)
            ->orderBy('u.price', 'DESC')
            ->getQuery();

        return $qb->execute();
    }

    public function findByCategory(Kategori $kategori)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.kategori = :kategori')
            ->setParameter('kategori', $kategori)
            ->getQuery()
            ->getResult();
    }
}
