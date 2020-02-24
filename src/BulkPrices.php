<?php

include_once('./src/Product.php');

class BulkPrices
{
    public function countBulkPrice(array $product)
    {
        $countName = 0;
        foreach ($product as $name) {
            if ($name->product  == 'car' ){
                $countName++;
            }
        }

        return $countName;
    }

    public function setBulk()
    {

    }
}