<?php


class Product
{
    public  $productType;
    public  $price;
    public  $discountable = false;
    public  $productCount = 1;

    public function __construct($productType, $price, Basket $basket)
    {
        $this->productType = $productType ;
        $this->price       = $price;
        $basket->addProduct($this);
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