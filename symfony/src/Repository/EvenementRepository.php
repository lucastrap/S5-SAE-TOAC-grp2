<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Evenement>
 *
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    public function getEvenements()
    {
        $events = $this->createQueryBuilder('e')
        ->select('e.title, e.start, e.toDate') // Select all relevant event fields
        ->getQuery()
        ->getResult();

        $eventsArray = [];
        foreach ($events as $event) {
            $eventsArray[$event['title']] = $event;
        }

        return $eventsArray;
    }

    public function getDates()
    {
        $groupedEvents = [];

        // Group events by date
        foreach ($events as $event) {
            $date = $event->getToDate(); // Assuming your Event class has a method to get the date
            if (!isset($groupedEvents[$date])) {
                $groupedEvents[$date] = [];
            }
            $groupedEvents[$date][] = $event;
        }

        return $groupedEvents;
    }

//    /**
//     * @return Evenement[] Returns an array of Evenement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Evenement
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
