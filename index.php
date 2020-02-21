<?php

include_once('./src/Product.php');
include_once('./src/Basket.php');

    $car        = new Product('car', 10);
    $banana     = new Product('banana', 2);
    $mouse      = new Product('mouse', 5);
    $bread      = new Product('bread', 3);
    $cat        = new Product('cat', 12);
    $basket     = new Basket();
    $basket->addProduct($car);
    $basket->addProduct($banana);
    $basket->addProduct($mouse);
    $basket->addProduct($bread);
    $basket->addProduct($cat);

$getSumProducts = $basket->calculatePrice($basket->getBasketWithProducts());

    var_dump($getSumProducts);