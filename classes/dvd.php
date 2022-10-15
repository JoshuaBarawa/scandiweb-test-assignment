<?php

require_once('./classes/abstract/product.php');

class dvd extends product{
  
public $size;

public function create_product(){

    echo 'Saving DVD product.....';

    if((isset($this->sku)) && (isset($this->name)) && (isset($this->price)) && (isset($this->type)) && (isset($this->size))){
        $sql="INSERT INTO products (sku,name,price,type,size) VALUES(:sku,:name,:price,:type,:size)";
        $prep=$this->conn->prepare($sql);
        return $prep->execute(['sku'=>$this->sku,'name'=>$this->name,'price'=>$this->price,'type'=>$this->type,'size'=>$this->size]);
    }
    else{
        return false;
    }
    
}


}
?>