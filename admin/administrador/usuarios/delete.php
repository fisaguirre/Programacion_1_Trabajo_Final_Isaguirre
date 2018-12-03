<?php session_start(); ?>

<?php 

if($_SESSION['admin']!=1){
  header('Location: ../../login.html');
}
?>
<html>
<head>
<title></title>
</head>
<body>


<?php

include_once '../../../config/database.php';
include_once '../../objects/administrador.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);

$admin->usuario_id=$_GET['usuario_id'];

if(($admin->usuario_id)!=NULL){
    if($admin->delete())
{
    echo "se borro";

    echo "<button type=\"submit\">Regresar a Login";
    echo "<button type=\"submit\">Regresar a Menu de borrar";
    echo "<button type=\"submit\">Regresar al Menu de administrador";

    }else{
        echo "no se borro";
    }
}
else{
    echo "no se encontro nada";
}




 ?>
<a href="../menu_usuarios.php">Volver al menu</a>

</body>
</html>
