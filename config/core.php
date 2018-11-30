<?php
// show error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// set your default time-zone
date_default_timezone_set('America/Argentina/Mendoza');

// variables used for jwt
//propia clave secreta y unica
$key = "example_key";//nombre secreto para encriptar y desencriptar token
//identifica la pagina que creo el token
$iss = "http://example.org";
//identifica los destinatarios que recibiran el token
$aud = "http://example.com";
//identifica hora en el que se emitio el token
$iat = 1356999524;
//identifica la hora antes de la cual el JWT no debe ser aceptado para su procesamiento
$nbf = 1357000000;
//el tiempo de nbf es menor al iat para evitar probemas de region
?>
