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
      echo "<div class=\"container\">";
      echo "<h1>Modificar Usuario</h1>";
      echo "<p>Completa los casilleros</p>";
      echo "<hr>";
      echo "<input type=\"hidden\" name=\"usuario_id\" value=\"$fila[usuario_id]\">";
      echo "<label for=\"nombre\"><b>Nombre</b></label>";
      echo "<input type=\"text\" placeholder=\"Ingrese Nombre\" name=\"nombre\" value=\"$fila[nombre]\" required>";
      echo "<br>";
      echo "<label for=\"clave\"><b>Clave</b></label>";
      echo "<input type=\"text\" placeholder=\"Ingrese Clave\" name=\"clave\" value=\"$fila[clave]\" required>";
      echo "<br>";
      echo "<label>";
      if($fila['rol']=='administrador'){
        echo "<input type=\"radio\" name=\"rol\" value=\"administrador\" checked>";
      }else{
        echo "<input type=\"radio\" name=\"rol\" value=\"administrador\">";
      }
      echo "<span>";
      echo "Administrador";
      echo "</span>";
      echo "</label>";
      echo "<label>";
      if($fila['rol']=='usuario'){
        echo "<input type=\"radio\" name=\"rol\" value=\"usuario\" checked>";
      }else{
        echo "<input type=\"radio\" name=\"rol\" value=\"usuario\">";
      }
      echo "<span>";
      echo "Usuario";
      echo "</span>";
      echo "</label>";
      echo "<div class=\"clearfix\">";
      echo "<button type=\"submit\" class=\"signupbtn\">Guardar cambios</button>";
      ?>
    <button type="button" onClick='location.href="../menu_usuarios.php"'>Menu Usuarios</button>
    <button type="button" onClick='location.href="../../home.php"'>HOME</button>
    <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>
    <?php
      echo "</div>";
      echo "</div>";

      break;
    }
  }
}


    ?>


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