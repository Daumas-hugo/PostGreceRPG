<?php

namespace App\Repository;

use App\Entity\SkillRace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkillRace|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillRace|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillRace[]    findAll()
 * @method SkillRace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillRaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillRace::class);
    }

    // /**
    //  * @return SkillRace[] Returns an array of SkillRace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SkillRace
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
