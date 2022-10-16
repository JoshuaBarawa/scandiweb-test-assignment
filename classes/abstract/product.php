<?php

require_once('./classes/abstract/database.php');

abstract class product extends database {

    public $conn;
    
    public $id;
    public $sku;
    public $name;
    public $price;
    public $type;
   

    public function __construct(){
        $this->conn = $this->getConnection();
    }

    abstract public function create_product();

    public function get_all_products(){
       
        $sql="SELECT * FROM products";
        $prep=$this->conn->prepare($sql);
        $prep->execute();
        $result=$prep->fetchAll();
        return $result;
    }

    
    public function delete_product(){

        $query = "DELETE FROM products WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
