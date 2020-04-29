<?php

namespace testLib\src\unitTest;

use PHPUnit\Framework\TestCase;
use Mockery;
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
        $currentProduct = array('car', 10);

        $this->basket->addProduct($this->product);
        $this->assertEquals($this->basket, $currentProduct, 'The products do not meet the expected result.');
    }

    /**
     * Price with discount for basket
     */
    public function testGetPriceWithDiscount()
    {
        $currentPrice = ['car', 15];

        $products = [
            0 => ['car', 10],
            1 => ['car', 10],
            2 => ['car', 10],
            ];
        $discount = 50;
        $newPrice = $this->basket->shouldReceive('getPriceWithDiscount')->with($products, $discount);

        $this->assertEquals($newPrice, $currentPrice, 'Prices do not match result.');
    }

    /**
     * Discount for basket
     */
    public function testGetDiscountProductsFromBasket()
    {
        $currentBasket = [0 =>
            ['productType'  =>  'car'],
            ['price'        =>  10],
            ['discountable' =>  true],
            ['productCount' =>  1]
        ];

        $basket = [0 =>
            ['productType'  =>  'car'],
            ['price'        =>  10],
            ['discountable' =>  false],
            ['productCount' =>  1]
        ];
        $this->basket->shouldReceive('getDiscount');
        $basketWithDiscount = $this->basket->getDiscountProductsFromBasket($basket);

        $this->assertEquals($basketWithDiscount, $currentBasket,'Discount not set for basket.');
    }
}