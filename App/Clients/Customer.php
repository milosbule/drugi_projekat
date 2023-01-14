<?php

use App\Shop\Cart;

require_once "App/Shop/Shop.php";

abstract class Customer
{
    protected int $id;
    protected string $firstname;
    protected string $lastname;
    protected float $money;
    protected $createdAt;

    public function __construct($id, $firstname, $lastname, $money)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->money = $money;
        $this->createdAt = date("d-m-Y h:i:sa");
        Shop::increaseNumberOfCustomers();
    }

    abstract public function getDiscount();

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function setMoney($money)
    {
        $this->money = $money;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function buy(Cart $o)
    {
        if ($this->money < $o->getTotalSum() * $this->getDiscount()) {
            echo "Nazalost nemate dovoljno novca na racunu.";
        } else {
            $this->money -= round(($o->getTotalSum() * $this->getDiscount()));
            echo $this->firstname . " " .  $this->lastname . " je uspesno izvrsio kupovinu: <br>" . "Vas racun iznosi " . ($o->getTotalSum() * $this->getDiscount()) . " eur";
        }
    }
}
