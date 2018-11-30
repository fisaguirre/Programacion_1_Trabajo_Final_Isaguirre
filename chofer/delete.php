<?php

//delete va como el update o como search con una key
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/chofer.php';


$database=new Database();
$db=$database->getConnection();

$chofer=new Chofer($db);

$data=json_decode(file_get_contents("php://input"));

$chofer->chofer_id=$data->chofer_id;

//hacer metodo para verificar si existe
//$chofer->verificar($id);

//despues hacer un if que llame a un metodo del objeto chofer para que verifique con un array si el chofer_id pasado por POST existe 
//y mandar una respuesta de error de chofer no encontrado o no existente
if(($chofer->chofer_id)!=NULL){
    if($chofer->delete())
{
    http_response_code(200);

    echo json_encode(array("message"=> "chofer borrado exitosamente"));
    }else{
        http_response_code(503);
        
        echo json_encode(array("message"=> "chofer no se borro"));
    }
}
else{
    http_response_code(404);

    echo json_encode(array("message"=> "no se encontro ningun chofer"));
}




 ?>
