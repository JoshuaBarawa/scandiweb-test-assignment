<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once './config/database.php';
include_once 'product.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);

$stmt = $product->getAllProducts();
$num = $stmt->rowCount();


if($num > 0){
  
    // products array
    $products_arr=array();
    $products_arr["products"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $product_item=array(
            "id" => $id,
            "sku" => $sku,
            "name" => $name,
            "price" => $price,
            "productType" => $productType,
            "size" => $size,
            "weight" => $weight,
            "height" => $height,
            "width" => $width,
            "length" => $length
        );
  
        array_push($products_arr["products"], $product_item);
    }
  
    http_response_code(200);

    echo json_encode($products_arr);
}