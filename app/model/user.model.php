<?php 

class UserModel{

    private $db;

    public function __construct(){

        require_once 'config_db/db.php';
        $conn = new db(); 
        $this->db = $conn->connection();

    }

    public function getUsers($users){

        $query = $this->db->prepare('SELECT * FROM client');

        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_OBJ);

        return $users;

    }

    //en la DB declare como default user, cuando me registre y me creo el hash, lo modifique desde la DB para ponerle 
    // como rol : admin, asi cada vez que se registre un usuario su rol va a ser user, y ya tengo mi rol de admin listo.

    public function registeredUser($user, $password){
        
        $query = $this->db->prepare('INSERT INTO client (username, password) VALUES (? , ?)');

        $query->execute([$user,$password]);

    }
 
    public function loggedUser($user){ 

       $query = $this->db->prepare('SELECT * FROM client WHERE username = ?');

       $query->execute([$user]);

       $user = $query->fetch(PDO::FETCH_OBJ);

       return $user;

    }

    public function getUser($user){

        $query = $this->db->prepare('SELECT * FROM client WHERE username=?');
    
        $query->execute([$user]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }

}