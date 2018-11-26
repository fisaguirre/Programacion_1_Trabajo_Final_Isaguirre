<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

include_once '../config/database.php';
include_once '../objects/chofer.php';


//creamos objeto database y conectamox
$database=new Database();
$db=$database->getConnection();

//creamos objeto chofer y le pasamos la conexion
$chofer=new Chofer($db);

//obtengo el valor(la key) de chofer para editar el registro
//transformo lo que obntengo por input a una cadena
$data = json_decode(file_get_contents("php://input"));


//referencio $data al id que obtuve y lo guardo en chofer referenciado a id
$chofer->chofer_id=$data->chofer_id;

//establezo los demas valoresç
$chofer->nombre=$data->nombre;
$chofer->apellido=$data->apellido;
$chofer->documento=$data->documento;
$chofer->email=$data->email;
$chofer->sistema_id=$data->sistema_id;
$chofer->vehiculo_id=$data->vehiculo_id;


//llamamos al metodo update() del objeto chofer
if($chofer->update())
{
    http_response_code(200);

    echo json_encode(array("message" => "chofer actualizado correctamente"));
}else{
    http_response_code(503);

    echo json_encode(array("message" => "chofer no se ha actualizado"));
}



?>
