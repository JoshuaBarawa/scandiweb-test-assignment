<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: DELETE");
  

include_once './config/database.php';
include_once 'product.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
  
$data = json_decode(file_get_contents("php://input"));
  
$product->id = $data->id;
  
if($product->delete()){
    http_response_code(200);
    echo json_encode(array("message" => "Product was deleted."));
}
  
else{

    http_response_code(503);
    echo json_encode(array("message" => "Unable to delete product."));
}
?>