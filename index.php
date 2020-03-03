<?php

include_once('./src/Product.php');
include_once('./src/Basket.php');

$basket     = new Basket();
$products   = [];

$productsCar     = new Product('car', 10, $basket);
$productsCar1    = new Product('car', 10, $basket);
$productsCar2    = new Product('car', 10, $basket);
$productsBanana  = new Product('banana', 2, $basket);
$productsBanana1 = new Product('banana', 2, $basket);
$productsBanana2 = new Product('banana', 2, $basket);
$productsMouse   = new Product('mouse', 5, $basket);
$productsBread   = new Product('bread', 3, $basket);
$productsCat     = new Product('cat', 12, $basket);

$discount   = new StandardDiscount('car', 3, 50, $basket);

$basketSum = $basket->calculatePrice();

var_dump($basketSum);