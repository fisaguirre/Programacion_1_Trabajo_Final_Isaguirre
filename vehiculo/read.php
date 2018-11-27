<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/vehiculo.php';


$database=new Database();
$db=$database->getConnection();


$vehiculo=new Vehiculo($db);

$stmt=$vehiculo->read();
$cantidad=$stmt->rowCount();

$arr_vehiculo=array();
$arr_vehiculo["records"]=array();

//vemos si hay por lo menos un registro
if($cantidad>0)
{
    //obtenemos un array de los registros y los recuperamos con fetch refenciado por $stmt
    //y lo guardamos en $row
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {

        //sin extract no puedo ponerlos en $arr_items
        extract($row);


        $arr_items=array(
            "id" => $vehiculo_id,
            "patente" => $patente,
            "anho_patente" => $anho_patente,
            "anho_fabricacion" => $anho_fabricacion,
            "marca" => $marca,
            "modelo" => $modelo,
            "created" => $created,
            "updated" => $updated
        );

        array_push($arr_vehiculo["records"],$arr_items);
    }

    http_response_code(200);

    echo json_encode($arr_vehiculo);


}else{
    http_response_code(404);

    echo json_encode(array("message"=>"no se encontro ningun registro"));
}

?>