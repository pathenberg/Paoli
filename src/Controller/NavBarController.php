<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Produits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavBarController extends AbstractController
{
    #[Route('/nav', name: 'app_nav')]
    public function index(EntityManagerInterface $doctrine): Response
    {

        $categories = $doctrine->getRepository(Categories::class)->findAll();

        return $this->render('nav.html.twig', [
            'categories' => $categories
        ]);
    }
}
