<?php

include_once 'autoload.php';

class Basket
{
    private $products;
    private $discount;

    /**
     * @param mixed $discounts
     */
    public function setDiscount( array $discounts): void
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    public function addProduct(array $products)
    {
        foreach ($products as $product )
        $this->products[] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function removeProductsByType($type)
    {
        foreach ($this->products as $index => $product) {
            if ($product->productType == $type) {
                unset($this->products[$index]);
            }
        }
    }

    public function calculatePrice()
    {
        $discountProducts = $this->getDiscountProductsFromBasket();

        foreach ($this->getDiscount() as $item => $value){
            if (empty($discountProducts) || count($discountProducts) < $this->getDiscount()[$item]->getProductCount()) {
                return;
            }
            $this->removeProductsByType($this->getDiscount()[$item]->getProductType());
            $this->addProduct($this->getDiscountProduct($discountProducts, $this->getDiscount()[$item]->getDiscount()));
        }
        var_dump($this);die();
    }

    private function getDiscountProductsFromBasket()
    {
        $products         = $this->getProducts();
        $discountProducts = [];

        foreach ($this->getDiscount() as $item => $value){

            foreach ($products as $product) {
            if ($product->productType != $this->getDiscount()[$item]->getProductType()) {
                continue;
            }
            $discountProducts[] = $product;
            }
        }
        return $discountProducts;
    }

    private function getPriceWithDiscount($discountProducts, $discount) : float
    {
        foreach ($this->getDiscount() as $item => $value){
           $priceWithDiscount =  $discountProducts[0]->price * $discount->getDiscount() * 0.01 * $discount->getProductCount();
        }
        return $priceWithDiscount;
    }

    private function getDiscountProduct(array $discountProducts, $discount)
    {
        $newDiscountProduct = new Product($discount->getProductType(), $this->getPriceWithDiscount($discountProducts,$discount));
        $newDiscountProduct->setDiscountability(true);
        $newDiscountProduct->setProductCount(count($discountProducts));

        return $newDiscountProduct;
    }
}