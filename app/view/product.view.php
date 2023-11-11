<?php

class ProductView {

    public function showAllProducts($products) {
        require_once './templates/products.phtml';
    }

    public function showDescriptionProduct($product){
        require_once 'templates/description_product.phtml';
    }
}