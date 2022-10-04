<?php

class Product{
  
    private $conn;
    private $table_name = "products";
  
    public $id;
    public $sku;
    public $name;
    public $price;
    public $productType;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;
  
    public function __construct($db){
        $this->conn = $db;
    }

function getAllProducts(){
  
    $query = "SELECT * FROM $this->table_name ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
  
    return $stmt;
}



function createProduct(){
  
    $query = "INSERT INTO
                " . $this->table_name . " SET 
                sku=:sku, name=:name, price=:price, productType=:productType, size=:size, weight=:weight, height=:height, 
                width=:width, length=:length";
  
    $stmt = $this->conn->prepare($query);


    $stmt->bindParam(":sku", $this->sku);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":productType", $this->productType);
    $stmt->bindParam(":size", $this->size);
    $stmt->bindParam(":weight", $this->weight);
    $stmt->bindParam(":height", $this->height);
    $stmt->bindParam(":width", $this->width);
    $stmt->bindParam(":length", $this->length);
  
    if($stmt->execute()){
        return true;
    }
  
    return false; 
}



function delete(){

    // $sql = "DELETE FROM products WHERE id = :id";
    // $path = explode('/', $_SERVER['REQUEST_URI']);

    // $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':id', $this->id);

    // if($stmt->execute()){
    //     return true;
    // }
    
    // return false;
  
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(1, $this->id);

    if($stmt->execute()){
        return true;
    }
  
    return false;
}



}
?>