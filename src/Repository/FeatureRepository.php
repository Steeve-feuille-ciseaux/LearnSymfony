<?php

namespace App\Repository;

use App\Entity\Feature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Feature>
 *
 * @method Feature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Feature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Feature[]    findAll()
 * @method Feature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Feature::class);
    }

    public function save(Feature $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function searchByTerm($term)
    {
        // QueryBuilder permet de créer des requêtes SQL en PHP
        $queryBuilder = $this->createQueryBuilder('feature');

        // Requête
        $query = $queryBuilder
            ->select('feature')
            ->leftJoin('feature.methodes', 'methodes') // leftJoin sur la table format
            ->where('feature.nom LIKE :term') // WHERE en SQL
            ->orwhere('methodes.nom LIKE :term') // WHERE en SQL
            ->orWhere('methodes.projet LIKE :term')
            ->orWhere('methodes.devReferant LIKE :term')
            ->setParameter('term', '%' . $term . '%')
            // On attribue le term rentré et on sécurise
            ->getQuery();

        return $query->getResult();
    }

    public function remove(Feature $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Feature[] Returns an array of Feature objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Feature
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
