<?php
require_once 'app/model/category.model.php';
require_once 'app/view/category.view.php';

class CategoryController{
    private $model;
    private $view;

    public function __construct(){
        //me aseguro que este logueado
        //AuthHelper::verify();
        session_start();
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }
    public function showAllCategories(){
       
        $categories = $this->model->getAllCategories();
        if(!empty($categories)){

            $this->view->showAllCategories($categories);

        }else{

            $this->view->showError();
        }

    }
    
    public function showCategory(){
?>
        <label class="label_category" for="category">Categoría:</label>
                        <select name="category" id="category">
            <?php
            
                //traerme todas las categorias para matchearla con la fk
                $categories = $this->model->getAllCategories();
                    foreach ($categories as $category) {
                echo "<option value='" . $category->id . "'>" . $category->season . "</option>";
            }
            ?>
        </select>
        <?php



    }
    
}