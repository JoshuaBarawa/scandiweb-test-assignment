<?php

require_once('./classes/abstract/product.php');

class furniture extends product{
  
    public $height;
    public $width;
    public $length;


    public function create_product(){

        echo 'Saving Furniture product.....';
        
        if((isset($this->sku)) && (isset($this->name)) && (isset($this->price)) && (isset($this->type))  && (isset($this->height)) && (isset($this->width)) && (isset($this->length))){
            $sql="INSERT INTO products (sku,name,price,type,height,width,length) VALUES(:sku,:name,:price,:type,:height,:width,:length)";
            $prep=$this->conn->prepare($sql);
            return $prep->execute(['sku'=>$this->sku,'name'=>$this->name,'price'=>$this->price,'type'=>$this->type,'height'=>$this->height,'width'=>$this->width,'length'=>$this->length]);
        }
        else{
            return false;
        }
        
    }

}
?>