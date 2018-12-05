<?php

if($_SERVER['HTTP_REFERER'] == "crud.php"){

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: GET");

		include_once '../config/database.php';
		include_once '../objects/sistema_transporte.php';


		$database=new Database();
		$db=$database->getConnection();


		$sistema_transporte=new Sistema_transporte($db);

		$stmt=$sistema_transporte->read();
		$cantidad=$stmt->rowCount();

		$arr_sistema_transporte=array();
		$arr_sistema_transporte["records"]=array();

		//vemos si hay por lo menos un registros
		if($cantidad>0)
		{
				//obtenemos un array de los registros y los recuperamos con fetch refenciado por $stmt
				//y lo guardamos en $row
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{

						//sin extract no puedo ponerlos en $arr_items
						extract($row);

						$arr_items=array(
										"sistema_id" => $sistema_id,
										"nombre" => $nombre,
										"pais_procedencia"=> $pais_procedencia,
										"created" => $created,
										"updated" => $updated
										);

						array_push($arr_sistema_transporte["records"],$arr_items);
				}

				http_response_code(200);

				echo json_encode($arr_sistema_transporte);


		}else{
				http_response_code(404);

				echo json_encode(array("message"=>"no se encontro ningun registro"));
		}
}
else {
		echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}

?>
