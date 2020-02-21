<?php

namespace src;

class Product
{
    public string $product;
    public float $unitPrice;

    public function __construct($product, $unitPrice)
    {
        $this->product   = $product ;
        $this->unitPrice = $unitPrice;
    }
}
