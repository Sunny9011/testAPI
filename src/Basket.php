<?php

include_once 'src/discounts/StandardDiscount.php';

class Basket
{
    private $products;

    public function addProduct(Product $newProduct)
    {
        $this->products[] = $newProduct;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function calculatePrice(): float
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->price;
        }

        return $sum;
    }

    public function removeProductsByType($type)
    {
        foreach ($this->products as $index => $product) {
            if ($product->productType == $type) {
                unset($this->products[$index]);
            }
        }
    }

    public function applyDiscounts(StandardDiscount $discount)
    {
        $discountProducts = $this->getDiscountProductsFromBasket($discount);
        if (empty($discountProducts) || count($discountProducts) < $discount->getProductCount()) {
            return;
        }
        $this->removeProductsByType($discount->getProductType());
        $this->addProduct($this->getDiscountProduct($discountProducts, $discount));
    }

    private function getDiscountProductsFromBasket($discount)
    {
        $products         = $this->getProducts();
        $discountProducts = [];

        foreach ($products as $product) {
            if ($product->productType != $discount->getProductType()) {
                continue;
            }
            $discountProducts[] = $product;
        }

        return $discountProducts;
    }

    private function getPriceWithDiscount($discountProducts, $discount) : float
    {
        return $discountProducts[0]->price * $discount->getDiscount() * 0.01 * $discount->getProductCount();
    }

    private function getDiscountProduct(array $discountProducts, $discount)
    {
        $newDiscountProduct = new Product($discount->getProductType(), $this->getPriceWithDiscount($discountProducts,$discount));
        $newDiscountProduct->setDiscountability(true);
        $newDiscountProduct->setProductCount(count($discountProducts));

        return $newDiscountProduct;
    }
}