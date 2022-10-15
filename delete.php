<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: DELETE");
  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./classes/app.php');
  
$app = new app();
$data = json_decode(file_get_contents("php://input"));
  

if($app->delete_product($data->id)){
    http_response_code(200);
    echo json_encode(array("message" => "Product was deleted."));
}
  
else{

    http_response_code(503);
    echo json_encode(array("message" => "Unable to delete product."));
}
?>