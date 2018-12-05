<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Argentina/Mendoza');


include_once '../config/database.php';
include_once '../objects/usuario.php';

//creamos objetos database y conectamos
$database = new Database();
$db = $database->getConnection();

//creamos objeto usuario y conectamos
$usuario = new Usuario($db);

//obtenemos datos por input
$data = json_decode(file_get_contents("php://input"));

if(
				!empty($data->nombre) &&
				!empty($data->clave) && 
				!empty($data->rol)
  ){


		$usuario->nombre = $data->nombre;
		$usuario->clave = $data->clave;
		$usuario->rol=$data->rol;
		$usuario->created = date('Y-m-d H:i:s');

		if($usuario->create()){

				http_response_code(200);

				echo json_encode(array("message" => "Usuario creado."));
		}

		else{

				http_response_code(400);

				echo json_encode(array("message" => "No se creo usuario."));
		}
}
else{

		http_response_code(400);

		echo json_encode(array("message" => "No se puede crear usuario, faltan datos."));
}

?>
