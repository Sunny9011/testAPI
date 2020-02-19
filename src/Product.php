<?php

namespace src;

class Product
{
    public $product;
    public $unitPrice;


    public function __construct($product, $unitPrice)
    {
        $this->product   = $product ;
        $this->unitPrice = $unitPrice;

    }
}
