<?php

namespace testLib\src;

class Product
{
    public $productType;
    public $price;
    public $discountable = false;
    public $productCount = 1;

    public function __construct($productType, $price)
    {
        $this->productType = $productType;
        $this->price = $price;
    }

    public function setDiscountability($discountable)
    {
        $this->discountable = $discountable;
    }

    public function setProductCount($productCount)
    {
        $this->productCount = $productCount;
    }
}