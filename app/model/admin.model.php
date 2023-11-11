<?php
  
  require_once 'config_db/db.php';

class AdminModel{

    private $db;

   function __construct()
   {
    $conn = new db();
    $this->db = $conn->connection();
   }

    public function getAllProducts()
    {
        //Importante: En cada ítem siempre se debe mostrar el nombre de la categoría a la que pertenece.
        //muestro la categoria/temporada de cada producto terminado.
        $query = $this->db->prepare('SELECT * FROM products INNER JOIN category ON category.id = products.fk_id_category');

        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function getProductById($id){

        $query = $this->db->prepare('SELECT * FROM products WHERE id=?');
    
        $query->execute([$id]);
    
        $product = $query->fetch(PDO::FETCH_OBJ);
    
        return $product;
    }

    public function addProduct($img, $name, $description, $price, $fk_category)
    {

        //añadir: poder elegir la categoría a la que pertenecen utilizando un select que muestre el nombre de la misma. 

        $query = $this->db->prepare('INSERT INTO products VALUES(id=NULL,?, ?, ?, ?, ?)');

        $query->execute([$img, $name, $description, $price, $fk_category]);

        //muestro el ultimo id que hay
        return $this->db->lastInsertId();
    }

    function updateProduct($name, $description, $price, $id) {    
        $query = $this->db->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
        $query->execute([$name, $description, $price, $id]);
    }

    public function deleteProductById($id)
    {

        $query = $this->db->prepare('DELETE FROM products WHERE id=?');
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    //CATEGORY
    public function getAll()
    {

        $query = $this->db->prepare('SELECT * FROM category');

        $query->execute();

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
    public function deleteCategoryById($id)
    {

        $query = $this->db->prepare('DELETE FROM category WHERE id=?');

        $query->execute([$id]);

        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category;
    }
    public function addCategory($name, $season)
    {

        
        $query = $this->db->prepare('INSERT INTO category VALUES(id=NULL,?, ?)');

        $query->execute([$name, $season]);

        //muestro el ultimo id que hay
        return $this->db->lastInsertId();
    }
    function updateCategory($id,$name,$season) {    
        $query = $this->db->prepare('UPDATE category SET name = ?, season = ? WHERE id = ?');
        $query->execute([$name, $season, $id]);
    }
}