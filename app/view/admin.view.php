<?php

class AdminView {
    public function showFormAddProduct(){
        require_once 'templates/add_product_admin.phtml';
       
    }
    public function showDeleteProds($products) {
        require_once 'templates/delete_products_admin.phtml';
    }
    
    public function showFormAddCategory(){
        require_once 'templates/add_category_admin.phtml';
    }
    public function showDeleteCat($categories){
        require_once 'templates/delete_category_admin.phtml';
    }



}