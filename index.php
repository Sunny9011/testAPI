<?php

use src\Product;
use src\Basket;

if (isset($_REQUEST['product']) && isset($_REQUEST['price'])) {
    $newProduct     = new Product($_REQUEST['product'], $_REQUEST['price']);
    $objectBasket   = new Basket();
    $basket         = $objectBasket->createProducts($newProduct);
    $getSumProducts = $objectBasket->calculatePrice($basket);

    var_dump($getSumProducts);
}