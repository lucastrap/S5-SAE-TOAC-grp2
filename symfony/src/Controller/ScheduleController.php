<?php
namespace App\Controller;

use App\Entity\Evenement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScheduleController extends AbstractController
{
    #[Route('/schedule', name: 'schedule')]
    public function index(EntityManagerInterface $em): Response
    {
        $events = $em->getRepository(Evenement::class)->findAll();
        // Initialize an array to store events grouped by date
        $groupedEvents = [];

        foreach ($events as $event) {
            $date = $event->getToDate()->format('l d F');
            $groupedEvents[$date][] = $event;
        }

        // Get the unique dates
        $uniqueDates = array_keys($groupedEvents);

        // Limit the number of unique dates to two
        $uniqueDates = array_slice($uniqueDates, 0, 2);

        // You can also limit the number of events per date here if needed
        $limitedGroupedEvents = [];
        foreach ($uniqueDates as $date) {
            $limitedGroupedEvents[$date] = $groupedEvents[$date];
        }

        return $this->render('schedule/index.html.twig', [
            'controller_name' => 'ScheduleController',
            'groupedEvents' => $limitedGroupedEvents,
            'uniqueDates' => $uniqueDates,
        ]);
    }
}
