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

foreach ($products as $product) {
    $basket->addProduct($product);
}
$discount   = new StandardDiscount('car', 3, 50, $basket);

$basketSum = $basket->calculatePrice();

var_dump($basketSum);