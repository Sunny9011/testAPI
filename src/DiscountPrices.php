<?php

include_once('./src/Product.php');

class DiscountPrices
{
    public function countDiscountPrice(array $products)
    {
        $countName = 0;

        foreach ($products as $product) {
            if ($product->product  == 'car' ){
                $countName++;
            }
        }

        return $countName;
    }

    public function setDiscount()
    {

    }
}