<?php

namespace src;

if (isset($_REQUEST['product']) && isset($_REQUEST['code'])) {
    $createProduct = new Basket();
    $basket = $createProduct->createProducts($_REQUEST['product'], $_REQUEST['code']);
    $getSumProducts = $createProduct->calculatePrice($basket);

    return $getSumProducts;
}

