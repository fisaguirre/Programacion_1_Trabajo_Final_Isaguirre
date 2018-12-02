

<?php

  function crear($name,$total_time,$endpoint){
   
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


//incluyo conexion y objeto chofer
 include_once '../config/database.php';
 include_once '../objects/auditoria.php';

//creo objeto base de datos y apunto a su conexion
$database=new Database();
$db=$database->getConnection();

//creo objeto chofer y lo inicializo
$auditoria=new Auditoria($db);

//json_decode ->decodifica un string de JSON
//file_get_contents->transmite un fichero completo a una cadena
//"php://input" es un flujo de sólo lectura que permite leer datos del cuerpo solicitado
//En el caso de peticiones POST, es preferible usar php://input
//lo lee como un fichero
$data = json_decode(file_get_contents("php://input"));
//lee como fichero a los datos que paso por POST mediante POSTMAN
//verificamos si $data no esta vacio
$auditoria->user=$name;
$auditoria->response_time=$total_time;
$auditoria->endpoint=$endpoint;


  if($auditoria->create()){
    http_response_code(201);

    echo json_encode(array("message" =>"Chofer ha sido creado"));


  }else
  {
    http_response_code(503);

    echo json_encode(array("message"=>"Chofer no ha sido creado"));
  }

//orden de borrado
//sistema_vehiculo
//chofer
//vehiculo
//sistema_transporte


}

 ?>
