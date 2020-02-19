<?php


namespace src;


class Basket
{
    public function createProducts(Product $someProduct)
    {
        $allProduct = [];

        return $allProduct [] = $someProduct;
    }

    public function calculatePrice($products)
    {
        $sum = 0;
       foreach ($products as $product) {
           $sum += $product->price;
       }

       return $sum;
    }

}