<?php

namespace App\Repository;

use App\Entity\VehiculeSpe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehiculeSpe>
 *
 * @method VehiculeSpe|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiculeSpe|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiculeSpe[]    findAll()
 * @method VehiculeSpe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeSpeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiculeSpe::class);
    }

    public function add(VehiculeSpe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VehiculeSpe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VehiculeSpe[] Returns an array of VehiculeSpe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VehiculeSpe
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
