<?php

require_once 'app/controller/product.controller.php';
require_once 'app/controller/auth.controller.php';
require_once 'app/controller/admin.controller.php';
require_once 'app/helpers/auth.helpers.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action); 

$ProductController = new ProductController();
$AuthController = new AuthController();
$AdminController = new AdminController();
$AuthHelper = new AuthHelper();

switch ($params[0]) {
    case 'login':
        $AuthController->showLogin();
     break;
     case 'register':
        $AuthController->showRegister();
     break;
     case 'registered':
        $AuthController->registered();
     break;
     case 'logged':
        $AuthController->logged();
     break;
     case 'logout':
        $AuthHelper->logout();
     break;
    case 'home':
       $ProductController->showAllProducts();
    break;
    case 'descripcion':
        $ProductController->showDescriptionProduct($params[1]);
    break;
    case 'listar':
      $AdminController->showListProds();
   break;
    case 'agregar':
      $AdminController->showFormAddProduct();
   break;
    case 'agregarProducto':
      $AdminController->addProduct();
   break;
   case 'actualizar':
      $AdminController->showAllUpdatedProduct();
   break;
   case 'actualizarProducto':
      $AdminController->showDescriptionProductUpdated($params[1]);
   break;
   case 'actualizarProductoTotal':     //id        name     description    price 
      $AdminController->updateProduct($params[1],$params[2],$params[3],$params[4]);
   break;
   case 'eliminar':
      $AdminController->showDeleteProds();
   break;
   case 'eliminarProducto':
      $AdminController->deleteProductById($params[1]);
   break;
   case 'listarCategoria':
      $AdminController->showListCat();
   break;
   case 'agregarCategoria':
      $AdminController->showFormAddCategory();
   case 'agregarCategoria':
      $AdminController->addCategory();
   break;
   break;
   case 'actualizarCat':
      $AdminController->showAllUpdatedCategories();
   break;
   case 'actualizarCategoria':
      $AdminController->showDescriptionCatUpdated($params[1]);
   break;
   case 'actualizarCategoriaTotal':
   $AdminController->updateCategory($params[1],$params[2],$params[3]);
   break;
   case 'eliminarCat':
      $AdminController->showDeleteCat();
   break;
   case 'eliminarCategoria':
      $AdminController->deleteCategoryById($params[1]);
   break;




}

   