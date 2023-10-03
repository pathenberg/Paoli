<?php

namespace App\Manager;

use App\Entity\Order;
use App\Entity\Wishlist;
use App\Factory\OrderFactory;
use App\Factory\WishlistFactory;
use App\Form\WishListType;
use App\Storage\CartSessionStorage;
use App\Storage\WishlistSessionStorage;
use Doctrine\ORM\EntityManagerInterface;

class WishlistManager
{
    /**
     * @var CartSessionStorage
     */
    private $cartSessionStorage;

    /**
     * @var OrderFactory
     */
    private $cartFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * CartManager constructor.
     */
    public function __construct(
        WishlistSessionStorage $cartStorage,
        WishlistFactory $orderFactory,
        EntityManagerInterface $entityManager
    ) {
        $this->cartSessionStorage = $cartStorage;
        $this->cartFactory = $orderFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * Gets the current cart.
     */
    public function getCurrentCart(): Wishlist
    {
        $cart = $this->cartSessionStorage->getWishlist();

        if (!$cart) {
            $cart = $this->cartFactory->create();
        }

        return $cart;
    }

    /**
     * Persists the cart in database and session.
     */
    public function save(Wishlist $cart): void
    {
        // Persist in database
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        // Persist in session
        $this->cartSessionStorage->setWishlist($cart);
    }
}
