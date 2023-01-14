<?php

//primer koriscenja Trait-a sa stampanjem svih objekata koji se nalaze u Korpi (Cart)
//Implementirano u klasi Cart

namespace App\Utilities;

trait Printing
{
    public function printing()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
}
