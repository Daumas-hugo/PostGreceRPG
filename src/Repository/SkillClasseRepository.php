<?php

namespace App\Repository;

use App\Entity\SkillClasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkillClasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillClasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillClasse[]    findAll()
 * @method SkillClasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillClasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillClasse::class);
    }

    // /**
    //  * @return SkillClasse[] Returns an array of SkillClasse objects
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
    public function findOneBySomeField($value): ?SkillClasse
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
