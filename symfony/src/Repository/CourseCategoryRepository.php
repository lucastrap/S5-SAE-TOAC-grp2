<?php

namespace App\Repository;

use App\Entity\CourseCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourseCategory>
 *
 * @method CourseCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseCategory[]    findAll()
 * @method CourseCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseCategory::class);
    }

    public function getCategories()
    {
        $categories = $this->createQueryBuilder('c')
            ->select('c.name')
            ->getQuery()
            ->getResult();

        $categoriesArray = [];
        foreach ($categories as $category) {
            $categoriesArray[$category['name']] = $category['name'];
        }

        return $categoriesArray;
    }

//    /**
//     * @return CourseCategory[] Returns an array of CourseCategory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CourseCategory
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
