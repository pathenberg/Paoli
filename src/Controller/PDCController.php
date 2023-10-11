<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PDCController extends AbstractController
{
    #[Route('/p/d/c', name: 'app_p_d_c')]
    public function index(): Response
    {
        return $this->render('pdc/index.html.twig', [
            'controller_name' => 'PDCController',
        ]);
    }
}
