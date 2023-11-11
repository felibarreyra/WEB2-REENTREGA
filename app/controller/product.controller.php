<?php

require_once 'app/model/product.model.php';
require_once 'app/view/product.view.php';
require_once 'app/helpers/auth.helpers.php';

class ProductController{

    private $model;
    private $view;
    private $viewError;

    public function __construct(){
        //me aseguro que este logueado
        //AuthHelper::verify();
        session_start();
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->viewError = new AuthView();
        }

    public function showAllProducts(){
       
        $products = $this->model->getAllProducts();
        if(!empty($products)){

            $this->view->showAllProducts($products);


        }else{

           $this->viewError->showError('No hay productos en la DB');

        }

    }

    public function showDescriptionProduct($id){

        $product = $this->model->getProductById($id);
    
        if($product){

            $this->view->showDescriptionProduct($product);    


        }else{

            $this->viewError->showError('No hay productos en la DB para mostrar');

        }
    }

}