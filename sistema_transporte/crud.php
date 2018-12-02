<?php

$_SERVER['HTTP_REFERER'] = 'crud.php';////dirrecion de la pagina(si la hay)
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
include '../usuario/validate_token.php';


if( ($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt'])) ) {
    if( isset($_GET['key']) ) {
        include 'search.php';
        $endpoint='sistema_transporte-read';
    }else{
        include 'read.php';
        $endpoint='sistema_transporte-read';
    }
    
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    include 'create.php';
    $endpoint='sistema_transporte-create';
}
if($_SERVER['REQUEST_METHOD']==='PUT'){
    include 'update.php';
    $endpoint='sistema_transporte-updated';
}
if($_SERVER['REQUEST_METHOD']==='DELETE'){
    include 'delete.php';
    $endpoint='sistema_transporte-delete';
}

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);


include '../auditoria/create.php';

crear($name,$total_time,$endpoint);

?>