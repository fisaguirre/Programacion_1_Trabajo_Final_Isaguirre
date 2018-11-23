<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//conexion base de datos
// include database and object files
include_once '../config/database.php';
include_once '../objects/chofer.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$chofer = new Chofer($db);

//query chofer

$stmt = $chofer->read();
$num = $stmt->rowCount();

// check if more than 0 record found

if($num>0){

    // chofer array
    $chofer_arr=array();
    $chofer_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);


        $chofer_item=array(
            "apellido" => $apellido,
            "nombre" => $nombre,
            "documento" => $documento,
            "email" => $email,
            "vehiculo_id" => $vehiculo_id,
            "sistema_id" => $sistema_id,
            "created" => $created,
            "updated" => $updated
        );

        array_push($chofer_arr["records"], $chofer_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($chofer_arr);
}

// si no se encuentran registros entonces:
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No choferes found.")
    );
}

?>
