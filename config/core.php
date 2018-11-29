<?php
// show error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// set your default time-zone
date_default_timezone_set('America/Argentina/Mendoza');

// variables used for jwt
$key = "example_key";//nombre secreto para encriptar y desencriptar token
$iss = "http://example.org";//identifica a la pag que creo el token
$aud = "http://example.com";//identifica a la pag que recivio el token
$iat = 1356999524;//identifica el tieempo en el cual el token fue creado
$nbf = 1357000000;//identifica el tiempo antedes de que se acepte el token
//el tiempo de nbf es menor al iat para evitar probemas de region
?>
