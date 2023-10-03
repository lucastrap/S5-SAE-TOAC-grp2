<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/dashboard/blog', name: 'app_dashboard_blog')]
    public function index(): Response
    {
        return $this->render('dashboard/blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
