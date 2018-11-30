<?php


// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/sistema_transporte.php';


$database=new Database();
$db=$database->getConnection();

$sistema_transporte=new Sistema_transporte($db);

$data=json_decode(file_get_contents("php://input"));

$sistema_transporte->sistema_id=$data->sistema_id;


if(($sistema_transporte->sistema_id)!=NULL){
    if($sistema_transporte->delete())
{
    http_response_code(200);

    echo json_encode(array("message"=> "sistema_transporte borrado exitosamente"));
    }else{
        http_response_code(503);
        
        echo json_encode(array("message"=> "sistema_transporte no se borro"));
    }
}
else{
    http_response_code(404);

    echo json_encode(array("message"=> "no se encontro ningun sistema_transporte"));
}


//hacer un delete con clave? como en search, para borrar cualquier registro con esa clave/
//aunque se borrarian muchos registros....


 ?>
