<?php

$_SERVER['HTTP_REFERER'] = 'crud.php';////dirrecion de la pagina(si la hay)
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
include '../usuario/validate_token.php';

if( ($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt'])) ) {
    if( isset($_GET['key']) ) {
    //if( isset($_GET['chofer_id']) || isset($_GET['apellido']) || isset($_GET['nombre']) || isset($_GET['documento'])) {
        include 'search.php';
        $endpoint='http://localhost/2018/Trabajo_Final/chofer/read.php/';
       // exit;
    }else{
        include 'read.php';
       // $endpoint='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
       $endpoint='http://localhost/2018/Trabajo_Final/chofer/read.php/';
       // exit;
    }
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    include 'create.php';
    $endpoint='http://localhost/2018/Trabajo_Final/chofer/create.php/';

   // exit;
}
if($_SERVER['REQUEST_METHOD']==='PUT'){
    include 'update.php';
    $endpoint='http://localhost/2018/Trabajo_Final/chofer/update.php/';
  //  exit;
}
if($_SERVER['REQUEST_METHOD']==='DELETE'){
    include 'delete.php';
    $endpoint='http://localhost/2018/Trabajo_Final/chofer/delete.php/';

   // exit;
}
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);

include '../auditoria/create.php';

crear($name,$total_time,$endpoint);
?>