<?php


// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/chofer.php';

$database=new Database();
$db=$database->getConnection();

//le paso como parametro $db para que el objeto sepa cuales son los datos de la base de datos
$chofer=new Chofer($db);

//establecer propiedad id del campo a leer
$chofer->chofer_id = isset($_GET['chofer_id']) ? $_GET['chofer_id'] : die();
//leer los detalles del chofer a editar
$chofer->search();


if($chofer->nombre!=null)
{
  $chofer_arr=array(
    "id"=>$chofer->chofer_id,
    "nombre"=>$chofer->nombre,
    "apellido"=>$chofer->apellido,
    "documento"=>$chofer->documento,
    "vehiculo_id"=>$chofer->vehiculo_id,
    "sistema_id"=>$chofer->sistema_id,
    "modelo_vehiculo"=>$chofer->modelo_vehiculo
  );

  http_response_code(200);

  echo json_encode($chofer_arr);
}else {
  http_response_code(404);

  echo json_encode(array("message"=> "nombre no encontrado"));
}





 ?>
