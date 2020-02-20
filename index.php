<?php

require_once 'autoload.php';

if (isset($_REQUEST['product']) && isset($_REQUEST['price'])) {
    $newProduct     = new Product($_REQUEST['product'], $_REQUEST['price']);
    $basket         = new Basket();
    $basket->addProduct($newProduct);
    $getSumProducts = $basket->calculatePrice($basket);

}