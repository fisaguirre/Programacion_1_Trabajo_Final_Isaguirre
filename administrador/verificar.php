<?php session_start() ?>
<?php
include_once '../config/database.php';

include_once 'administrador.php';


$a=$_POST['usuario'];
$b=$_POST['clave'];

$database=new Database();
$db=$database->getConnection();

$admin=new Admin($db);

$existe=$admin->verificar($a,$b);

if($existe && password_verify($b, $admin->clave)){
    if( ($admin->rol)=='administrador') {
        $_SESSION['admin']=1;
        echo "pass correcta y es admin";
        header('Location: menu.php');
    }else{
        $_SESSION['admin']=0;
        echo "es usuario";
        header('Location: usuario.php');
    }
}
/*
if( ($existe && password_verify($b, $admin->clave)) ) {
    echo "<br>";
    echo "todo bien";
    echo "<br>";


}else{
    echo "<br>";
    echo "todo mal";
    echo "<br>";
}*/


?>