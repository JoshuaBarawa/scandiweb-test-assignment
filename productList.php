<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./classes/app.php');

$app = new app();

echo json_encode($app->get_all_products());