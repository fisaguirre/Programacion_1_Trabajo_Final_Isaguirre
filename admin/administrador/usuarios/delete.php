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
