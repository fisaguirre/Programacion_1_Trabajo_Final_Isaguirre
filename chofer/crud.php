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
       // exit;
    }else{
        include 'read.php';
       // exit;
    }
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    include 'create.php';
   // exit;
}
if($_SERVER['REQUEST_METHOD']==='PUT'){
    include 'update.php';
  //  exit;
}
if($_SERVER['REQUEST_METHOD']==='DELETE'){
    include 'delete.php';
   // exit;
}
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
include '../auditoria/create.php';

crear($name,$total_time);


?>