<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Argentina/Mendoza');


include_once '../config/database.php';


include_once '../objects/user.php';

//creamos objetos database y conectamos
$database = new Database();
$db = $database->getConnection();

//creamos objeto user y conectamos
$user = new User($db);

//obtenemos datos por input
$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->username) &&
    !empty($data->password)
){
// set product property values
$user->username = $data->username;
$user->password = $data->password;
$user->created = date('Y-m-d H:i:s');
// create the user
if($user->create()){

    // set response code
    http_response_code(200);

    // display message: user was created
    echo json_encode(array("message" => "User was created."));
}

// message if unable to create user
else{

    // set response code
    http_response_code(400);

    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user."));
  }
}
// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create sistema_transporte. Data is incomplete."));
}
