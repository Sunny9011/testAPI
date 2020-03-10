<?php

include_once 'src/discounts/BaseDiscount.php';

class StandardDiscount extends BaseDiscount
{
    public function getProductType()
    {
        return $this->productType;
    }

    public function getProductCount()
    {
        return $this->productCount;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

}