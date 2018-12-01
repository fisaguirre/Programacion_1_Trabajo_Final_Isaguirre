<?php
if($_SERVER['HTTP_REFERER'] == "crud.php"){
  
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../config/core.php';
include_once '../objects/vehiculo.php';

//creamos objetos de tipo base de datos y conectamos
$database=new Database();
$db=$database->getConnection();

//creamos objeto chofer
$vehiculo=new Vehiculo($db);

//obtenemos palabra clave
$keyword=isset($_GET["key"]) ? $_GET["key"] : "";

$stmt=$vehiculo->search($keyword);
$num=$stmt->rowCount();


if($num>0)
{
  $vehiculo_arr=array();
  $vehiculo_arr["records"]=array();


  //guardamos en $row los registros que vamos obteniendo de la base de datos del objeto chofer
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);

    $vehiculo_item=array(
      "vehiculo_id"=>$vehiculo_id,
      "patente"=>$patente,
      "anho_patente"=>$anho_patente,
      "anho_fabricacion"=>$anho_fabricacion,
      "marca"=>$marca,
      "modelo"=>$modelo,
      "created"=>$created,
      "updated"=>$updated
    );

    array_push($vehiculo_arr["records"],$vehiculo_item);
    
  }

  http_response_code(200);

  echo json_encode($vehiculo_arr);
}else{
  http_response_code(404);

  echo json_encode(array("message"=>"no se encontro nada"));
}

}
else {
  echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}

 ?>
