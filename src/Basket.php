<?php


namespace src;


class Basket
{
    public function addProduct(string $code, int $price)
    {
        $newProduct = new Product($code, $price);

        return $allProduct [] = $newProduct;
    }

    public function calculatePrice()
    {
        $this->addProduct('FC', 3);

    }

}