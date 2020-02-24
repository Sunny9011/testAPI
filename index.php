<?php

include_once('./src/Product.php');
include_once('./src/Basket.php');
include_once('./src/BulkPrices.php');

    $car        = new Product('car', 10);
    $car2        = new Product('car', 10);
    $car3        = new Product('car', 10);
    $banana     = new Product('banana', 2);
    $mouse      = new Product('mouse', 5);
    $bread      = new Product('bread', 3);
    $cat        = new Product('cat', 12);
    $basket     = new Basket();

    $basket->addProduct($car);
    $basket->addProduct($car2);
    $basket->addProduct($car3);
    $basket->addProduct($banana);
    $basket->addProduct($mouse);
    $basket->addProduct($bread);
    $basket->addProduct($cat);

    $bulkPrice = new BulkPrices();
    $resultName = $bulkPrice->countBulkPrice($basket->getBasketWithProducts());

//$getSumProducts = $basket->calculatePrice($bulkPrice);

    var_dump($resultName);