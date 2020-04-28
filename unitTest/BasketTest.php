<?php

namespace testLib\src\unitTest;

use PHPUnit\Framework\TestCase;
use testLib\src\Basket;
use testLib\src\discount\StandardDiscount;
use testLib\src\Product;

class BasketTest extends TestCase
{

    /**
     * @var Basket $basket
     */
    protected $basket;

    /**
     * @var StandardDiscount $discount
     */
    protected $discount;

    /**
     * @var Product $product
     */
    protected $product;

    public function setUp()
    {
        parent::setUp();
        $this->basket   = new Basket();
        $this->discount = new StandardDiscount('car', 3, 50);
        $this->product  = new Product('car', 10);
    }

    /**
     * Set discount for product
     */
    public function testSetDiscount()
    {
        $currentDiscount = array('car', 3, 50);
        $this->basket->setDiscount($this->discount);
        $this->assertEquals($this->basket, $currentDiscount, 'The discount set does not meet the expected result.');
    }

    /**
     * Get product for basket
     */
    public function testAddProduct()
    {
        $currentProduct = array('car', 3, 50);
        $this->basket->addProduct($this->product);
        $this->assertEquals($this->basket, $currentProduct, 'The products do not meet the expected result.');
    }


}