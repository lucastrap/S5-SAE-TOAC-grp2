<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\CourseCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RaceController extends AbstractController
{
    #[Route('/race', name: 'race')]
    public function index(EntityManagerInterface $em): Response
    {
        $categories = $em->getRepository(CourseCategory::class)->findAll();

        return $this->render('race/index.html.twig', [
            'controller_name' => 'RaceController',
            'categories' => $categories
        ]);
    }

    #[Route('/race/{id}', name: 'app_race_show')]
    public function show(Course $course) : Response

    {
 
        return $this->render('race/show.html.twig', [
            'race' => $course
        ]);
    }
}
