
<html>
<head>
<title></title>
</head>
<body>

<?php session_start();


if($_SESSION['admin']!=1) {
    header('Location ../../login.html');
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

    <input type="submit" name="datos" value="Crear Usuario">
        
    </form>



</body>
</html>
