<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\SmallCategories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmallCategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'app_small_category')]
    public function index(int $id, EntityManagerInterface $doctrine): Response
    {

        
        $products = $doctrine->getRepository(Produits::class)->findAll();
        $smallCategory = $doctrine->getRepository(SmallCategories::class)->find($id);

        return $this->render('small_category/index.html.twig', [
            'products' => $products,
            'smallCategory' => $smallCategory,
        ]);

    }
}
