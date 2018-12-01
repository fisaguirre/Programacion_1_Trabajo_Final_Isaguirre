<?php

if($_SERVER['HTTP_REFERER'] == "crud.php"){
  
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
//include_once '../config/core.php';
include_once '../objects/chofer.php';

//creamos objetos de tipo base de datos y conectamos
$database=new Database();
$db=$database->getConnection();

//creamos objeto chofer
$chofer=new Chofer($db);

//obtenemos palabra clave
$keyword=isset($_GET["key"]) ? $_GET["key"] : "";
//$keyword2=isset($_GET["documento"]) ? $_GET["documento"] : "";
//$keyword3=isset($_GET["nombre"]) ? $_GET["nombre"] : "";
//$keyword4=isset($_GET["documento"]) ? $_GET["documento"] : "";

//$stmt=$chofer->search($keyword,$keyword2,$keyword3,$keyword4);
$stmt=$chofer->search($keyword);


$num=$stmt->rowCount();


if($num>0)
{
  $chofer_arr=array();
  $chofer_arr["records"]=array();


  //guardamos en $row los registros que vamos obteniendo de la base de datos del objeto chofer
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);

    $chofer_item=array(
      "chofer_id"=>$chofer_id,
      "nombre"=>$nombre,
      "apellido"=>$apellido,
      "email"=>$email,
      "documento"=>$documento,
      "sistema_id"=>$sistema_id,
      "vehiculo_id"=>$vehiculo_id,
      "created"=>$created,
      "updated"=>$updated
    );

    array_push($chofer_arr["records"],$chofer_item);
    
  }

  http_response_code(200);

  echo json_encode($chofer_arr);
}else{
  http_response_code(404);

  echo json_encode(array("message"=>"no se encontro nada"));
}
}
else{
    echo json_encode(array("message" => "acceso denegado, dirigirse a crud.php"));
  }

 ?>
