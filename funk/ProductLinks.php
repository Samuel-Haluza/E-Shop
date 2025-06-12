<?php
class ProductLinks {
    private $products;

    public function __construct($products = []) {
        if (empty($products)) {
            $products = [
                ['label' => 'Luxury', 'link' => '#'],
                ['label' => 'Sport Wear', 'link' => '#'],
                ['label' => "Men's Shoes", 'link' => '#'],
                ['label' => "Women's Shoes", 'link' => '#'],
                ['label' => 'Popular Dress', 'link' => '#'],
                ['label' => 'Gym Accessories', 'link' => '#'],
                ['label' => 'Sport Shoes', 'link' => '#']
            ];
        }
        $this->products = $products;
    }

    public function getProducts() {
        return $this->products;
    }
}
