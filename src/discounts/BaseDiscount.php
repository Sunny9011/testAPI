<?php

abstract class BaseDiscount
{
    protected $productType;

    protected $productCount;

    protected $discount;


    public function __construct($productType, $productCount, $discount)
    {
        $this->productType  = $productType;
        $this->productCount = $productCount;
        $this->discount     = $discount;
    }

    public abstract function applyDiscounts(Basket $basket);
}