<?php

namespace App\Repository\Translation;

use App\Entity\Translation\TranslationOverrideDictionary;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<TranslationOverrideDictionary>
 */
class TranslationOverrideDictionaryRepository extends EntityRepository
{
    //    /**
    //     * @return TranslationOverrideDictionary[] Returns an array of TranslationOverrideDictionary objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TranslationOverrideDictionary
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
