<?php

namespace testLib\src\discount;


class PremiumDiscount extends BaseDiscount
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