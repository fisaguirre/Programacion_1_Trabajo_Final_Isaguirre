<?php

$_SERVER['HTTP_REFERER'] = 'crud.php';////dirrecion de la pagina(si la hay)

include '../user/validate_token.php';


if( ($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt'])) ) {
    if( isset($_GET['key']) ) {
        include 'search.php';
        exit;
    }else{
        include 'read.php';
        exit;
    }
    
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    include 'create.php';
    exit;
}
if($_SERVER['REQUEST_METHOD']==='PUT'){
    include 'update.php';
    exit;
}
if($_SERVER['REQUEST_METHOD']==='DELETE'){
    include 'delete.php';
    exit;
}

?>