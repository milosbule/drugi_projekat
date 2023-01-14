<?php

namespace App\Shop;

class CartItem
{

    private Product $product;
    private int $quantity;

    public function __construct(Product $product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity($ammount = 1)
    {
        if ($this->getQuantity() + $ammount > $this->getProduct()->getAvailableQuantity()) {
            echo "Kolicina proizvoda ne moze biti veca od " . $this->getProduct()->getAvailableQuantity();
        } else {
            $this->quantity += $ammount;
        }
    }

    public function decreaseQuantity($ammount = 1)
    {
        if ($this->getQuantity() - $ammount < 1) {
            echo "Kolicina proizvoda ne moze biti manja od 1";
        } else {
            $this->quantity -= $ammount;
        }
    }
}
