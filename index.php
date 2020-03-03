<?php

include_once('./src/Product.php');
include_once('./src/Basket.php');

$basket     = new Basket();
$products   = [];

$products[] = new Product('car', 10);
$products[] = new Product('car', 10);
$products[] = new Product('car', 10);
$products[] = new Product('banana', 2);
$products[] = new Product('banana', 2);
$products[] = new Product('banana', 2);
$products[] = new Product('mouse', 5);
$products[] = new Product('bread', 3);
$products[] = new Product('cat', 12);
$products[] = new Product('banana', 20);
$products[] = new Product('keyboard', 30);

foreach ($products as $product) {
    $basket->addProduct($product);
}
$discountCar    = new StandardDiscount('car', 3, 50, $basket);
$discountBanana = new StandardDiscount('banana', 3, 50, $basket);
$discountCar->applyDiscounts();
$discountBanana->applyDiscounts();
$basketSum = $basket->calculatePrice();

var_dump($basketSum);