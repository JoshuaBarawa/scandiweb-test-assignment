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
  

error_reporting(-1); 
ini_set("display_errors", "1");
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");



require_once('./classes/app.php');

$app = new app();
  
$json = json_decode(file_get_contents('php://input'));


  
    if($app->create_product($json)){
        http_response_code(200);
        echo json_encode(array("message" => "Product was created."));
    }
  
    else{
        http_response_code(500);
        echo json_encode(array("message" => "Unable to create product."));
    }


  
?>