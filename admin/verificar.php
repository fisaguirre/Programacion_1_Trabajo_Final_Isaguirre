<?php session_start() ?>

<?php


include_once '../config/database.php';

include_once 'objects/administrador.php';


$a=$_POST['usuario'];
$b=$_POST['clave'];

$database=new Database();
$db=$database->getConnection();

$admin=new Admin($db);

$existe=$admin->verificar($a,$b);

if($existe && password_verify($b, $admin->clave)){
    if( ($admin->rol)=='administrador') {
        $_SESSION['admin']=1;
        header('Location: home.php');
    }else{
        $_SESSION['admin']=0;
        header('Location: login.html');
    }
}



?>