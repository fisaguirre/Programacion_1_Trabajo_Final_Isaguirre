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


    <form action="update.php" method="POST">

<?php


include_once '../../../config/database.php';
include_once '../../objects/administrador.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);


$stmt = $admin->read();
$num = $stmt->rowCount();

$var=$_GET['usuario_id'];


while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
  foreach($fila as $fil){
    if($fila['usuario_id']==$var){
      echo "<input type=\"hidden\" name=\"usuario_id\" value=\"$fila[usuario_id]\">";
      echo "Nombre:";
      echo "<input type=\"text\" name=\"nombre\" value=\"$fila[nombre]\">";
      echo "<br>";
      echo "Clave: ";
      echo "<input type=\"text\" name=\"clave\" value=\"$fila[clave]\">";
      echo "<br>";
      echo "Rol: ";
      echo "<input type=\"text\" name=\"rol\" value=\"$fila[rol]\">";
      echo "<br>";
      break;
    }
  }
}


    ?>

    <input type="submit" name="datos" value="Guardar Cambios">
        
    </form>


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
