<html>

<head>

  <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="../../css/create.css" rel="stylesheet" type="text/css" />
  <link href="../../css/table_read.css" rel="stylesheet" type="text/css" />
  <title></title>
</head>

<body>


<?php session_start() ?>

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
    ?>
    <div class="container">
      <h1>Se creo usuario correctamente</h1>
    </div>
    <?php
  }else
  {
    ?>
    <div class="container">
      <h1>No se pudo crear usuario</h1>
    </div>
    <?php
    }
}else
{
  ?>
  <div class="container">
    <h1>Faltan ingresar datos</h1>
  </div>
  <?php
}


 ?>
 <form action="create.php" method="POST" style="border:1px solid #ccc">


   <div class="container">
     <div class="clearfix">
       <button type="button" onClick='location.href="../menu_usuarios.php"'>Menu Usuarios</button>
       <button type="button" onClick='location.href="../../home.php"'>HOME</button>
       <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Cerrar
         Sesion</button>
     </div>
   </div>
 </form>
  <?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: ../../login.html');
}
?>

</body>

</html>