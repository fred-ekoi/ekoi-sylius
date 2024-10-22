<?php

namespace App\Repository\Translation;

use App\Entity\Translation\TranslationOverrideDictionary;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * @extends EntityRepository<TranslationOverrideDictionary>
 */
class TranslationOverrideDictionaryRepository extends EntityRepository
{
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, new ClassMetadata(TranslationOverrideDictionary::class));
    }

    /**
     * Find all the translation overrides that are relevant to the given key and value locales
     * @param string $keyLocale The locale of the key
     * @param string[] $valueLocales The locales of the values
     * @return TranslationOverrideDictionary[]
     */
    public function findRelevant(string $keyLocale, array $valueLocales): array {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.keyLocale', 'keyLocale')
            ->leftJoin('t.valueLocale', 'valueLocale')
            ->andWhere('keyLocale.code = :keyLocale')
            ->andWhere('valueLocale.code IN (:valueLocales)')
            ->setParameter('keyLocale', $keyLocale)
            ->setParameter('valueLocales', $valueLocales)
            ->getQuery()
            ->getResult()
        ;
    }

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
