<?php


// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/vehiculo.php';


$database=new Database();
$db=$database->getConnection();

$vehiculo=new Vehiculo($db);

$data=json_decode(file_get_contents("php://input"));

$vehiculo->vehiculo_id=$data->vehiculo_id;


if(($vehiculo->vehiculo_id)!=NULL){
    if($vehiculo->delete())
{
    http_response_code(200);

    echo json_encode(array("message"=> "vehiculo borrado exitosamente"));
    }else{
        http_response_code(503);
        
        echo json_encode(array("message"=> "vehiculo no se borro"));
    }
}
else{
    http_response_code(404);

    echo json_encode(array("message"=> "no se encontro ningun vehiculo"));
}



//orden de borrado
//sistema_vehiculo
//chofer
//vehiculo
//sistema_transporte



 ?>
