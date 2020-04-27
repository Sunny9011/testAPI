<?php

namespace testLib\src\discount;

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