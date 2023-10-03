<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Wishlist;
use App\Form\AddToCartType;
use App\Form\AddToWishlistType;
use App\Manager\WishlistManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    // #[Route('/product/{id}', name: 'app_product')]
    // public function index(String $id, EntityManagerInterface $doctrine): Response
    // {   
    //     $product = $doctrine->getRepository(Produits::class)->find($id);
    //     return $this->render('produits/index.html.twig', [
    //         'product' =>  $product,
    //     ]);
    // }
    // #[Route('/product/{id}', name: 'app_product.detail')]
    // public function detail(Produits $product, Request $request, CartManager $cartManager)
    // {
    //     $form = $this->createForm(AddToCartType::class);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $item = $form->getData();
    //         $item->setProduct($product);

    //         $cart = $cartManager->getCurrentCart();
    //         $cart
    //             ->addItem($item)
    //             ->setUpdatedAt(new \DateTime());

    //         $cartManager->save($cart);

    //         return $this->redirectToRoute('product.detail', ['id' => $product->getId()]);
    //     }

    //     return $this->render('product/detail.html.twig', [
    //         'product' => $product,
    //         'form' => $form->createView()
    //     ]);
    // }

    /**
     * @Route("/product/{id}", name="product.detail")
     */
    #[Route('/product/{id}', name: 'app_product')]
    public function index2(Produits $product, Request $request, WishlistManager $cartManager): Response
    {
        $form = $this->createForm(AddToCartType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $item->setProduct($product);

            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($item)
                ->setUpdatedAt(new \DateTime());

            $cartManager->save($cart);

            return $this->redirectToRoute('product.detail', ['id' => $product->getId()]);
        }

        return $this->render('produits/detail.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
}
