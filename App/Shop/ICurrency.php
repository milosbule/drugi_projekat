<?php

//kreiran interface koji implementiraju dve klase Euro i Rsd radi laksih promena ukoliko se za tim ukaze potreba
//funkcija getCurrency takodje koriscena u __toString() metodi u Product-u

namespace App\Shop;

interface ICurrency
{
    public function getCurrency();
}
