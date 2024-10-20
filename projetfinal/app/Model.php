<?php

class Model {
    public function getProducts() {
        return [
            ['id' => 1, 'name' => 'Produit 1', 'price' => 20, 'description' => 'Description du produit 1'],
            ['id' => 2, 'name' => 'Produit 2', 'price' => 15, 'description' => 'Description du produit 2'],
            ['id' => 3, 'name' => 'Produit 3', 'price' => 30, 'description' => 'Description du produit 3'],
        ];
    }

    public function getProductById($id) {
        $products = $this->getProducts();
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }
}
