<?php

require_once('./classes/abstract/product.php');

class book extends product{
  
public $weight;

public function create_product(){

    echo 'Saving Book product.....';

    if((isset($this->sku)) && (isset($this->name)) && (isset($this->price)) && (isset($this->type))  && (isset($this->weight))){
        $sql="INSERT INTO products (sku,name,price,type,weight) VALUES(:sku,:name,:price,:type,:weight)";
        $prep=$this->conn->prepare($sql);
        return $prep->execute(['sku'=>$this->sku,'name'=>$this->name,'price'=>$this->price,'type'=>$this->type,'weight'=>$this->weight]);
    }
    else{
        return false;
    }
    
}


}
?>