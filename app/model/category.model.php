<?php 

class CategoryModel {

    private $db;

    public function __construct(){

        require_once 'config_db/db.php';
        $conn = new db();
        $this->db = $conn->connection();

    }

    public function getAllCategories(){

        $query = $this->db->prepare('SELECT * FROM category');

        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }
    public function getCategoryBySeason($season) {

        $query = $this->db->prepare('SELECT * FROM category WHERE season = ?');
        
        $query->execute([$season]);
        
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }
   
    public function deleteCategory($id){
        $query=$this->db->prepare('DELETE FROM category WHERE id=?');
        $query->execute([$id]);
        $category=$query->fetch(PDO::FETCH_OBJ);

    }
    public function addCategory($id,$name,$season){

        $query = $this->db->prepare('INSERT INTO category VALUES id=NULL,?,?');

        $query->execute([$id,$name,$season]);
    }
    public function getCategoryById($id){

        $query = $this->db->prepare('SELECT * FROM category WHERE id=?');
        
        $query->execute([$id]);
        
        $category = $query->fetch(PDO::FETCH_OBJ);
        
        return $category;
    
    }

}   


