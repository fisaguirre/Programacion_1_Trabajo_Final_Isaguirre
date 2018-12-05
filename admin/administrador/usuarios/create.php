<?php session_start() ?>

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

if(
  !empty($_POST['nombre']) &&
  !empty($_POST['clave']) &&
  !empty($_POST['rol']) 
  )
{
  $admin->nombre=$_POST['nombre'];
  $admin->clave=$_POST['clave'];
  $admin->rol=$_POST['rol'];
  $admin->created = date('Y-m-d H:i:s');

  if($admin->create())
  {
    echo "se creo";
  }else
  {
    echo "no se creo";
}
}else
{
    echo "vacio";
}


 ?>
  <a href="../menu_usuarios.php">Volver al menu</a>


  <div class="row">
    <div class="col-lg-6">
      <button id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>

    </div>
  </div>
  <?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: ../../login.html');
}
?>

</body>

</html>