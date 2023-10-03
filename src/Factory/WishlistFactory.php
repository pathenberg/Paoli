<?php

namespace App\Factory;
use App\Entity\Produits;
use App\Entity\Wishlist;
use App\Entity\WishlistItem;

/**
 * Class WishlistFactory.
 */
class WishlistFactory
{
    /**
     * Creates an order.
     */
    public function create(): Wishlist
    {
        $order = new Wishlist();
        $order
            ->setStatus(Wishlist::STATUS_CART)
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

        return $order;
    }

    /**
     * Creates an item for a product.
     */
    public function createItem(Produits $product): WishlistItem
    {
        $item = new WishlistItem();
        $item->setProduct($product);
        $item->setQuantity(1);

        return $item;
    }
}
