<?php


class Basket
{
    private $products;

    public function addProduct(Product $newProduct)
    {
        $this->products[] = $newProduct;
    }

    public function getBasketWithProducts(): array
    {
        return $this->products;
    }

    public function calculatePrice($products): float
    {
        $sum = 0;
       foreach ($products as $product) {
           $sum += $product->unitPrice;
       }

       return $sum;
    }
}