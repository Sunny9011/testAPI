<?php

include_once 'src/discounts/StandardDiscount.php';
class Basket
{
    private $products;
    private $discount;

    /**
     * @param mixed $discounts
     */
    public function setDiscount( array $discounts): void
    {
        foreach ($discounts as $discount){
            $this->discount[] = $discount;
        }
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

//    public function calculatePrice(): float
//    {
//        $sum = 0;
//        foreach ($this->products as $product) {
//            $sum += $product->price;
//        }
//
//        return $sum;
//    }

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

        foreach ($this->getDiscount() as $item){
            if (empty($discountProducts) || count($discountProducts) < $this->getDiscount()[$item]->getProductCount()) {
                return;
            }
        }

        $this->removeProductsByType($discount->getProductType());
        $this->addProduct($this->getDiscountProduct($discountProducts, $discount));
    }

    private function getDiscountProductsFromBasket()
    {
        $products         = $this->getProducts();
        $discountProducts = [];

        foreach ($products as $product) {
            if ($product->productType != $this->getDiscount()->getProductType()) {
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