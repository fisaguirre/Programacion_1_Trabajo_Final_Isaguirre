<html>
<head>

<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../../css/create.css" rel="stylesheet" type="text/css"/>
<link href="../../css/table_read.css" rel="stylesheet" type="text/css"/>
<title></title>
</head>
<body>

<?php session_start(); ?>

<?php 

if($_SESSION['admin']!=1){
  header('Location: ../../login.html');
}
?>


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
    ?>
      <div class="container">
      <h1>Usuario borrado correctamente</h1>
    </div>
   

<form action="create.php" method="POST" style="border:1px solid #ccc">
<div class="container">
  <div class="clearfix">
  <button type="button" onClick='location.href="../menu_usuarios.php"'>Menu Usuarios</button>
      <button type="button" onClick='location.href="../../home.php"'>HOME</button>
    <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Cerrar Sesion</button>
  </div>
</div>
</form>

<?php
    }else{
        ?>
      <div class="container">
      <h1>Usuario no borrado</h1>
    </div>
    <?php
    }
}
else{
    ?>
    <div class="container">
    <h1>No se encontro nada</h1>
  </div>
  <?php
}




 ?>


<?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: ../../login.html');
}
?>
</body>
</html>
