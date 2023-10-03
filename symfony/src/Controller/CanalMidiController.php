<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CanalMidiController extends AbstractController
{
    #[Route('/canalmidi', name: 'canal_midi')]
    public function index(): Response
    {
        return $this->render('canal_midi/index.html.twig', [
            'controller_name' => 'CanalMidiController',
        ]);
    }
}
