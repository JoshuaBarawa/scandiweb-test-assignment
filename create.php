<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
  
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header("HTTP/1.1 200 OK");
die();
}
  
  

include_once './config/database.php';
include_once 'product.php';

error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");


  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
$data = json_decode(file_get_contents("php://input"));

    
    $product->sku = $data->sku;
    $product->name = $data->name;
    $product->price = $data->price;
    $product->productType = $data->productType;
    $product->size = $data->size;
    $product->weight = $data->weight;
    $product->height = $data->height;
    $product->width = $data->width;
    $product->length = $data->length;
  
    if($product->createProduct()){
        http_response_code(200);
        echo json_encode(array("message" => "Product was created."));
    }
  
    else{
        http_response_code(500);
        echo json_encode(array("message" => "Unable to create product."));
    }

  
?>