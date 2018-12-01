<?php

if($_SERVER['HTTP_REFERER'] == "crud.php"){
  
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../config/core.php';
include_once '../objects/sistema_transporte.php';

//creamos objetos de tipo base de datos y conectamos
$database=new Database();
$db=$database->getConnection();

//creamos objeto chofer
$sistema_transporte=new Sistema_transporte($db);

//obtenemos palabra clave
$keyword=isset($_GET["key"]) ? $_GET["key"] : "";

$stmt=$sistema_transporte->search($keyword);
$num=$stmt->rowCount();


if($num>0)
{
  $sistema_transporte_arr=array();
  $sistema_transporte_arr["records"]=array();


  //guardamos en $row los registros que vamos obteniendo de la base de datos del objeto sistema_transporte
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);

    $sistema_transporte_item=array(
      "sistema_id"=>$sistema_id,
      "nombre"=>$nombre,
      "pais_procedencia"=>$pais_procedencia,
      "created"=>$created,
      "updated"=>$updated
    );

    array_push($sistema_transporte_arr["records"],$sistema_transporte_item);
    
  }

  http_response_code(200);

  echo json_encode($sistema_transporte_arr);
}else{
  http_response_code(404);

  echo json_encode(array("message"=>"no se encontro nada"));
}


}
else {
  echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
}
 ?>
