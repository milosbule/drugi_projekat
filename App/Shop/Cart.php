<?php

namespace App\Shop;

require_once "App/Utilities/Printing.php";

use App\Utilities\Printing;

class Cart
{
    use Printing;

    private array $items = [];

    public function getItems()
    {
        return $this->items;
    }
    public function setItems($items)
    {
        $this->items = $items;
    }

    public function findCartItem(int $productId)
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->getId() === $productId) {
                return $item->getProduct();
            }
        }
    }

    public function addProduct(Product $product, int $quantity)
    {
        $cartItem = $this->findCartItem($product->getId());
        if ($cartItem === null) {
            $cartItem = new CartItem($product, 0);
            $this->items[] = $cartItem;
        }
        $cartItem->increaseQuantity($quantity);
        return $cartItem;
    }

    public function removeProduct(Product $product)
    {
        foreach ($this->items as $index => $item) {
            if ($item->getProduct()->getId() === $product->getId()) {
                unset($this->items[$index]);
                return;
            }
        }
    }

    public function getTotalQuantity()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->getQuantity();
        }
        return $sum;
    }


    public function getTotalSum()
    {
        $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }
        return $totalSum;
    }
}
