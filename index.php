<?php

include 'autoload.php';

    $newProduct     = new Product('car', 10);
    $newProduct     = new Product('banana', 2);
    $newProduct     = new Product('mouse', 5);
    $newProduct     = new Product('bread', 3);
    $newProduct     = new Product('cat', 12);
    $basket         = new Basket();
    $basket->addProduct($newProduct);
    $getSumProducts = $basket->calculatePrice($basket->getBasketWithProducts());

    var_dump($getSumProducts);