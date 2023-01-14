<?php

//kreirana klasa Shop sa stacikim propertijem i metodom koja ima za cilj da pokaze broj korisnika lanca jedne prodavnice
//kreirana instanca klase sa nazivom i adresom koja broji ukupan broj korisnika koji su instancirani

class Shop
{
    private static int $customerCount = 0;
    private string $name;
    private string $adress;

    public function __construct($name, $adress)
    {
        $this->name = $name;
        $this->adress = $adress;
    }

    static function increaseNumberOfCustomers()
    {
        self::$customerCount++;
    }

    public static function getCustomerCount()
    {
        return self::$customerCount;
    }

    public static function printCustomerCount()
    {
        echo "Ukupan broj korisnika lanca je " . self::$customerCount;
    }
}
