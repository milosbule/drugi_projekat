<?php

class Guest extends Customer
{
    public function getDiscount()
    {
        return 0.9;
    }
}
