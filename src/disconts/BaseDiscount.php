<?php

abstract class BaseDiscount
{
    protected $productType;

    protected $productCount;

    protected $discount;

    protected $basket;

    public function __construct($productType, $productCount, $discount, Basket $basket)
    {
        $this->productType  = $productType;
        $this->productCount = $productCount;
        $this->discount     = $discount;
        $this->basket       = $basket;
    }

    public abstract function applyDiscounts();
}