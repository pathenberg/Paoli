<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaisonPaoliController extends AbstractController
{
    #[Route('/maison/paoli', name: 'app_maison_paoli')]
    public function index(): Response
    {
        return $this->render('maison_paoli/index.html.twig', [
            'controller_name' => 'MaisonPaoliController',
        ]);
    }
}
