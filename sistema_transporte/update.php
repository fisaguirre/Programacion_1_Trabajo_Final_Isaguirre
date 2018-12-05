<?php

if($_SERVER['HTTP_REFERER'] == "crud.php"){

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: PUT");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

		include_once '../config/database.php';
		include_once '../objects/sistema_transporte.php';

		$database=new Database();
		$db=$database->getConnection();

		$sistema_transporte=new Sistema_transporte($db);

		$data=json_decode(file_get_contents("php://input"));


		$sistema_transporte->sistema_id=$data->sistema_id;
		$sistema_transporte->nombre=$data->nombre;
		$sistema_transporte->pais_procedencia=$data->pais_procedencia;


		if($sistema_transporte->update())
		{
				http_response_code(200);

				echo json_encode(array("message"=>"actualizado correctamente"));
		}else{
				http_response_code(500);

				echo json_encode(array("message"=>"no llamo funcion update"));
		}
}
else {
		echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}
?>
