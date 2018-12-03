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


$stmt = $admin->read();
$num = $stmt->rowCount();

$admin->usuario_id=$_POST['usuario_id'];
$admin->nombre=$_POST['nombre'];
$admin->clave=$_POST['clave'];
$admin->rol=$_POST['rol'];


if(
    !empty($admin->usuario_id) &&
    !empty($admin->nombre) &&
    !empty($admin->clave) &&
    !empty($admin->rol)     
    )
  {
    if($admin->update()){

        echo "chofer actualizado correctamente";
        }else{
            echo "chofer no ctualizado";

        }
}else{
    echo "faltan datos";
}
      
    


?>


<a href="../menu_usuarios.php">Volver al menu</a>

</body>
</html>
