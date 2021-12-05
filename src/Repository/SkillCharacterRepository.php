<?php

namespace App\Repository;

use App\Entity\SkillCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkillCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillCharacter[]    findAll()
 * @method SkillCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillCharacter::class);
    }

    // /**
    //  * @return SkillCharacter[] Returns an array of SkillCharacter objects
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
    public function findOneBySomeField($value): ?SkillCharacter
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
