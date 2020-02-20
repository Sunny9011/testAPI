<?php


namespace src;


class Basket
{
    public array $products;

    public function addProduct(Product $newProduct)
    {
        $this->products[] = $newProduct;
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