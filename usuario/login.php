<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../libs/vendor/autoload.php';
use \Firebase\JWT\JWT;

include_once '../config/database.php';
include_once '../objects/usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->nombre) &&
    !empty($data->clave)
){
$usuario->nombre = $data->nombre;
$usuario->clave = $data->clave;
$usuario_exists = $usuario->usuarioExists();

//generate json web token

include_once '../config/core.php';

//al llamar al a funcion usuarioExists() guardamos en $usuario->password el hash
//con password_verify comprobamos si lo que recibimos por input $data->password coincide con el hash $usuario->password
//(que se habia creado al momento de crear usuario)
if($usuario_exists && password_verify($data->clave, $usuario->clave)){

    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "usuario_id" => $usuario->usuario_id,
           "usuario" => $usuario->nombre
       )
    );

    // set response code
    http_response_code(200);

    // generate jwt
    $jwt = JWT::encode($token, $key);
    
    echo json_encode(
            array(
                "message" => "Successful login.",
                "jwt" => $jwt
            )
        );
        //hacer un return de date para fecha_acceso
}

else{

   // set response code
   http_response_code(401);

   // tell the usuario login failed
   echo json_encode(array("message" => "Login failed."));
}
}
// tell the usuario data is incomplete

else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the usuario
    echo json_encode(array("message" => "Unable to login. Data is incomplete."));
}
