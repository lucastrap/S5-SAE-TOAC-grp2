<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnalyticsController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard_analytics_index')]
    public function index(): Response
    {
        return $this->render('dashboard/analytics/index.html.twig', [
            'controller_name' => 'AnalyticsController',
        ]);
    }
}
