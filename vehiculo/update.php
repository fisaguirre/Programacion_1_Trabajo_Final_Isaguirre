<?php
if($_SERVER['HTTP_REFERER'] == "crud.php"){

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: PUT");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

		include_once '../config/database.php';
		include_once '../objects/vehiculo.php';

		$database=new Database();
		$db=$database->getConnection();

		$vehiculo=new Vehiculo($db);

		$data=json_decode(file_get_contents("php://input"));

		if(
						!empty($data->vehiculo_id) &&
						!empty($data->patente) &&
						!empty($data->anho_patente) &&
						!empty($data->anho_fabricacion) &&
						!empty($data->marca) &&
						!empty($data->modelo) &&
						!empty($data->sistema_id)
		  ){
				$vehiculo->vehiculo_id=$data->vehiculo_id;
				$vehiculo->patente=$data->patente;
				$vehiculo->anho_patente=$data->anho_patente;
				$vehiculo->anho_fabricacion=$data->anho_fabricacion;
				$vehiculo->marca=$data->marca;
				$vehiculo->modelo=$data->modelo;
				$vehiculo->created = date('Y-m-d H:i:s');

				$vehiculo->sistema_id=$data->sistema_id;


				if($vehiculo->update())
				{
						http_response_code(200);

						echo json_encode(array("message"=>"actualizado correctamente"));
				}else{
						http_response_code(500);

						echo json_encode(array("message"=>"no llamo funcion update"));
				}
		}
}
else {
		echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}
?>
