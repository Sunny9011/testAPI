<?php


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

    public function applyDiscounts()
    {
        $discount = new StandardDiscount('car', 3, 50, $this);
        $discount->applyDiscounts();
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
            if ($product->type == $type) {
                unset($this->products[$index]);
            }
        }
    }
}