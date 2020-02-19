<?php


namespace src;


class Basket
{
    public function addProduct(string $code, int $price)
    {
        return new Product($code, $price);
    }

    public function calculatePrice()
    {
        $this->addProduct('FC', 3);

    }

}