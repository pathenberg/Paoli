<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CDVController extends AbstractController
{
    #[Route('/c/d/v', name: 'app_c_d_v')]
    public function index(): Response
    {
        return $this->render('cdv/index.html.twig', [
            'controller_name' => 'CDVController',
        ]);
    }
}
