<?php

require_once('book.php');
require_once('dvd.php');
require_once('furniture.php');

class app{


    public function get_all_products(){
        $product = new book();
        return $product->get_all_products(); 
    }


    public function create_product($product){

        $product_classname = strtolower($product->type);
        $product_object = new $product_classname;

        $product_object->sku = $product->sku;
        $product_object->name = $product->name;
        $product_object->price = $product->price;
        $product_object->type = $product->type;
        $product_object->size = $product->size;
        $product_object->weight = $product->weight;
        $product_object->height = $product->height;
        $product_object->width = $product->width;
        $product_object->length = $product->length;

        if($product_object->create_product()){
            return json_encode("success");
        }
        else{
            return json_encode("error");
        }
  
   
   

    }


    public function delete_product($id){
        $product = new book();
        $product->id = $id;
        return $product->delete_product(); 
    }

}
