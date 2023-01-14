<?php

//kreirana klasa koja implementira interface ICurrency kako bi se preuzimala prava valuta bez rucnog kucanja
//Instancirana odmah na pocetku kako bi kasnije bila koriscena u kasnijem izvrsavanju koda

namespace App\Shop;

require_once "ICurrency.php";

class Euro implements ICurrency
{
    public function getCurrency()
    {
        return "eur";
    }
}
