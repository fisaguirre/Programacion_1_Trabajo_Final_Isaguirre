<?php
if($_SERVER['HTTP_REFERER'] == "crud.php"){
  
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config/database.php';
include_once '../objects/sistema_transporte.php';

$database=new Database();
$db=$database->getConnection();

$sistema_transporte=new Sistema_transporte($db);

$data=json_decode(file_get_contents("php://input"));


if(
    !empty($data->nombre) &&
    !empty($data->pais_procedencia)
){
$sistema_transporte->nombre=$data->nombre;
$sistema_transporte->pais_procedencia=$data->pais_procedencia;
$sistema_transporte->created=date('Y-m-d H:i:s');


if($sistema_transporte->create())
{
    http_response_code(200);

    echo json_encode(array("message"=>"se creo exitosamente"));
}else{
    http_response_code(500);

    echo json_encode(array("message"=>"no se creo"));
}
}else{
    // set response code - 400 bad request
    http_response_code(400);
    // tell the user
    echo json_encode(array("message" => "Faltan datos"));
}

}
else {
  echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}

?>