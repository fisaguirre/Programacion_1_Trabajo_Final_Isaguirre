<html>

<head>

  <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="../../css/create.css" rel="stylesheet" type="text/css" />
  <link href="../../css/table_read.css" rel="stylesheet" type="text/css" />
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
      ?>
  <div class="container">
    <h1>Usuario modificado correctamente</h1>
  </div>
  <?php

        }else{
          ?>
  <div class="container">
    <h1>Usuario no modificado</h1>
  </div>
  <?php

        }
}else{
  ?>
  <div class="container">
    <h1>Faltan Datos</h1>
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
