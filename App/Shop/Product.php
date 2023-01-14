<?php

namespace App\Shop;

class Product
{
    private int $id;
    private string $name;
    private int $price;
    private ICurrency $currency;
    private int $availableQuantity;

    public function __construct($id, $name, $price, $currency, $availableQuantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
        $this->availableQuantity = $availableQuantity;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
    }

    public function addToCart(Cart $cart, int $quantity)
    {
        return $cart->addProduct($this, $quantity);
    }

    public function removeFromCart(Cart $cart)
    {
        return $cart->removeProduct($this);
    }

    public function __toString()
    {
        return strtoupper("Proizvod sa ID:  " . $this->id . "<br>" . "Nazivom: " . $this->name . "<br>" . "Cenom: " . $this->price . " " . $this->currency->getCurrency() . "<br>" . "Kolicinom: " . $this->availableQuantity . "<br>" . " je na stanju.");
    }
}
