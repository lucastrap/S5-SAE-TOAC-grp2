<?php

namespace App\Controller;

use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RaceController extends AbstractController
{
    #[Route('/race', name: 'race')]
    public function index(EntityManagerInterface $em): Response
    {
        $triathlon = $em->getRepository(Course::class)->findAll();
        return $this->render('race/index.html.twig', [
            'controller_name' => 'RaceController',
            'triathlon' => $triathlon
        ]);
    }
}
