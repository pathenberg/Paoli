<?php

namespace App\Controller;

use App\Entity\Produits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    #[Route('/product/{id}', name: 'app_product')]
    public function index(String $id, EntityManagerInterface $doctrine): Response
    {   
        $product = $doctrine->getRepository(Produits::class)->find($id);
        return $this->render('produits/index.html.twig', [
            'product' =>  $product,
        ]);
    }
}
