<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use App\Entity\Evenement;
use App\Entity\Post;
use App\Entity\User;
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
        $url = $routeBuilder->setController(PostCrudController::class)->generateUrl();

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
            // MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::linkToRoute("Accueil", "fa fa-home", "app_index"),

            MenuItem::section('Blog'),
            MenuItem::linkToCrud('Articles', 'fa fa-file-text', Post::class),

            MenuItem::section('Organisation'),
            MenuItem::linkToCrud('Évènements', 'fa fa-calendar-days', Evenement::class),
            MenuItem::linkToCrud('Courses', 'fa fa-running', Course::class),
            MenuItem::linkToCrud('Users', 'fa fa-users', User::class),

            MenuItem::section(),
            MenuItem::linkToLogout('Logout', 'fa fa-sign-out-alt'),
        ];
    }
}
