<?php

namespace testLib\src;

use testLib\src\discount\StandardDiscount;

class Basket
{

    private $products;
    private $discount;

    public function calculatePrice()
    {
        $discountProducts = $this->getDiscountProductsFromBasket();

        foreach ($this->getDiscount() as $item => $value) {
            if (empty($discountProducts) || count($discountProducts) < $this->getDiscount()[$item]->getProductCount()) {
                return;
            }
            $this->removeProductsByType($this->getDiscount()[$item]->getProductType());
            $this->addProduct($this->getDiscountProduct($discountProducts, $this->getDiscount()[$item]->getDiscount()));
        }
    }

    private function getDiscountProductsFromBasket()
    {
        $products = $this->getProducts();
        $discountProducts = [];

        foreach ($this->getDiscount() as $item => $value) {

            foreach ($products as $product) {
                if ($product->productType != $this->getDiscount()[$item]->getProductType()) {
                    continue;
                }
                $discountProducts[] = $product;
            }
        }
        return $discountProducts;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discounts
     */
    public function setDiscount(array $discounts): void
    {
        foreach ($discounts as $discount) {
            $this->discount[] = $discount;
        }
    }

    public function removeProductsByType($type)
    {
        foreach ($this->products as $index => $product) {
            if ($product->productType == $type) {
                unset($this->products[$index]);
            }
        }
    }

    public function addProduct(array $products): void
    {
        foreach ($products as $product)
            $this->products[] = $product;
    }

    private function getDiscountProduct(array $discountProducts, $discount)
    {
        $newDiscountProduct = new Product($discount->getProductType(), $this->getPriceWithDiscount($discountProducts, $discount));
        $newDiscountProduct->setDiscountability(true);
        $newDiscountProduct->setProductCount(count($discountProducts));

        return $newDiscountProduct;
    }

    private function getPriceWithDiscount($discountProducts, $discount): float
    {
        foreach ($this->getDiscount() as $item => $value) {
            $priceWithDiscount = $discountProducts[0]->price * $discount->getDiscount() * 0.01 * $discount->getProductCount();
        }
        return $priceWithDiscount;
    }
}