<?php 
namespace App\Storage;

use App\Entity\Wishlist;
use App\Repository\WishlistRepository;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class CartSessionStorage
 * @package App\Storage
 **/
class WishlistSessionStorage
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * The cart repository.
     *
     * @var WishlistRepository
     */
    private $WishlistRepository;

    /**
     * @var string
     */
    const WISHLIST_KEY_NAME = 'wishlist_id';

    /**
     * CartSessionStorage constructor.
     *
     * @param RequestStack $requestStack
     * @param WishlistRepository $cartRepository
     */
    public function __construct(RequestStack $requestStack, WishlistRepository $cartRepository)
    {
        $this->requestStack = $requestStack;
        $this->WishlistRepository = $cartRepository;
    }

    /**
     * Gets the wishlist in session.
     *
     * @return Wishlist|null
     */
    public function getWishlist(): ?Wishlist
    {
        return $this->WishlistRepository->findOneBy([
            'id' => $this->getWishlistId(),
            'status' => Wishlist::STATUS_CART
        ]);
    }

    /**
     * Sets the Wishlist in session.
     *
     * @param Wishlist $Wishlist
     */
    public function setWishlist(Wishlist $Wishlist): void
    {
        $this->requestStack->getSession()->set(self::WISHLIST_KEY_NAME, $Wishlist->getId());
    }

    /**
     * Returns the Wishlist id.
     *
     * @return int|null
     */
    private function getWishlistId(): ?int
    {
        return $this->requestStack->getSession()->get(self::WISHLIST_KEY_NAME);
    }
}
