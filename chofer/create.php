<?php

if($_SERVER['HTTP_REFERER'] == "crud.php"){//dirrecion de la pagina(si la hay)
  
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


//incluyo conexion y objeto chofer
 include_once '../config/database.php';
 include_once '../objects/chofer.php';

//creo objeto base de datos y apunto a su conexion
$database=new Database();
$db=$database->getConnection();

//creo objeto chofer y lo inicializo
$chofer=new Chofer($db);

//json_decode ->decodifica un string de JSON
//file_get_contents->transmite un fichero completo a una cadena
//"php://input" es un flujo de sólo lectura que permite leer datos del cuerpo solicitado
//En el caso de peticiones POST, es preferible usar php://input
//lo lee como un fichero
$data = json_decode(file_get_contents("php://input"));
//lee como fichero a los datos que paso por POST mediante POSTMAN
//verificamos si $data no esta vacio



if(
  //nombre,apellido...
  //deben coincidir con el mismo "alias" que yo le pase por POST mediante postman
  !empty($data->nombre) &&
  !empty($data->apellido) &&
  !empty($data->documento) &&
  !empty($data->email) &&
  !empty($data->vehiculo_id) &&
  !empty($data->sistema_id)
  )
{
  //$data->nombre, ("nombre") es el dato que le paso por post, aunque si le pongo otro nombre funciona igual
  //$chofer->nombre, es el dato del objeto, aunque si le pongo otro nombre funciona igual
  //guardo en el objeto chofer todos los datos que le paso por POST mediante POSTMAN
  $chofer->nombre=$data->nombre;
  $chofer->apellido=$data->apellido;
  $chofer->documento=$data->documento;
  $chofer->email=$data->email;
  $chofer->vehiculo_id=$data->vehiculo_id;
  $chofer->sistema_id=$data->sistema_id;
  $chofer->created = date('Y-m-d H:i:s');
  //ahora llamo a la funcion create del objeto chofer
  if($chofer->create())
  {
    //codigo de respuesta correcto
    http_response_code(201);

    //mostrar mensaje
    echo json_encode(array("message" =>"Chofer ha sido creado"));
  }else
  {
    http_response_code(503);

    echo json_encode(array("message"=>"Chofer no ha sido creado"));
  }
}else
{
  http_responde_code(400);

  echo json_encode(array("message"=>"data esta vacio"));
}

//orden de borrado
//sistema_vehiculo
//chofer
//vehiculo
//sistema_transporte


}
else {
  echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}
 ?>
