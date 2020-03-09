<?php

include_once 'src/discounts/BaseDiscount.php';
include_once 'src/Basket.php';

class StandardDiscount extends BaseDiscount
{
    public object $basket;

    public function applyDiscounts(Basket $basket)
    {
        $this->basket = $basket;
        $discountProducts = $this->getDiscountProductsFromBasket();

        if (empty($discountProducts) || count($discountProducts) < $this->productCount) {
            return;
        }
        $this->basket->removeProductsByType($this->productType);
        $this->basket->addProduct($this->getDiscountProduct($discountProducts));
    }

    private function getDiscountProductsFromBasket()
    {
        $products         = $this->basket->getProducts();
        $discountProducts = [];

        foreach ($products as $product) {
            if ($product->productType != $this->productType) {
                continue;
            }
            $discountProducts[] = $product;
        }

        return $discountProducts;
    }

    private function getPriceWithDiscount($discountProducts) : float
    {
        return $discountProducts[0]->price * $this->discount * 0.01 * 3;
    }

    private function getDiscountProduct(array $discountProducts)
    {
        $newDiscountProduct = new Product($this->productType, $this->getPriceWithDiscount($discountProducts));
        $newDiscountProduct->setDiscountability(true);
        $newDiscountProduct->setProductCount(count($discountProducts));

        return $newDiscountProduct;
    }
}