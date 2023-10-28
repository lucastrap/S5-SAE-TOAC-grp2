<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use App\Entity\CourseCategory;
use App\Entity\Evenement;
use App\Entity\Post;
use App\Entity\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CourseCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TOAC')
            ->setLocales(["fr" => "🇫🇷 Français"])
            
        ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::section("Général"),
            MenuItem::linkToCrud("Users", "fa fa-users", User::class),
           
            MenuItem::section("Analyse"),
            MenuItem::linkToUrl('Google Analytics', 'fa fa-info', 'https://www.google.com/analytics', [
                'target' => '_blank',
            ]),
            MenuItem::section("Organisation"),
            MenuItem::linkToCrud("Évènements", "fa fa-calendar-days", Evenement::class),
            MenuItem::linkToCrud("Courses", "fa fa-running", Course::class),            
            MenuItem::linkToCrud("Catégories de Courses", "fa fa-list", CourseCategory::class),

            MenuItem::section("Autre"),
            MenuItem::linkToRoute("Retour au site", "fa fa-home", "app_index"),
            MenuItem::linkToLogout("Logout", "fa fa-sign-out-alt"),
        ];
    }
}
