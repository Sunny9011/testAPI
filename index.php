<?php

namespace src;

if (isset($_REQUEST['product']) && isset($_REQUEST['code'])) {
    $newProduct     = new Product($_REQUEST['product'], $_REQUEST['code']);
    $objectBasket   = new Basket();
    $basket         = $objectBasket->createProducts($newProduct);
    $getSumProducts = $objectBasket->calculatePrice($basket);

    return $getSumProducts;
}

