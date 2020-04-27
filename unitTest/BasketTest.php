<?php

namespace testLib\src\unitTest;

use PHPUnit\Framework\TestCase;
use testLib\src\Basket;

class BasketTest extends TestCase
{
    public function testSetDiscount()
    {
        $objBasket = new Basket();
        $discount = array('car', 3, 50);
        $actual = array('car', 3, 50);
        $objBasket->setDiscount($discount);
        $this->assertEquals($objBasket, $actual);
    }

    public function testAddProduct()
    {
        $objBasket = new Basket();
        $products = array('car', 10);
        $actual = array('car', 3, 50);
        $objBasket->addProduct($products);
        $this->assertEquals($objBasket, $actual);
    }


}