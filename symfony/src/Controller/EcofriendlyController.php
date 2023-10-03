<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EcofriendlyController extends AbstractController
{
    #[Route('/ecofriendly', name: 'ecofriendly')]
    public function index(): Response
    {
        return $this->render('ecofriendly/index.html.twig');
    }
}
