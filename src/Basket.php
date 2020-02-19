<?php


namespace src;


class Basket
{
    public function createProducts(string $code, int $price)
    {
        $newProduct = new Product($code, $price);
        $allProduct = [];
        return $allProduct [] = $newProduct;
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