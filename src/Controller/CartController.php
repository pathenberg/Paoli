<?php

namespace App\Controller;

use App\Entity\Wishlist;
use App\Form\CartType;
use App\Manager\WishlistManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    
    #[Route("/cart", name:"cart")]
     
    public function index(WishlistManager $cartManager, Request $request): Response
    {
        $cart = $cartManager->getCurrentCart();
        $form = $this->createForm(CartType::class, $cart);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cart->setUpdatedAt(new \DateTime());
            $cartManager->save($cart);

            return $this->redirectToRoute('cart');
        }

        return $this->render('wishlist/index.html.twig', [
            'cart' => $cart,
            'form' => $form->createView(),
        ]);
    }
}
