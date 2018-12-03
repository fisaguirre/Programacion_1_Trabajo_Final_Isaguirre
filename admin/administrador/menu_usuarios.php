<?php session_start() ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php


if($_SESSION['admin']!=1){
    header('Location: ../login.html');
}


?>

<form action="usuarios/read.php" method="POST">
<input type="submit" name="valor" value="Leer Registros">
</form>

  <form action="usuarios/create_menu.php" method="POST">
  <input type="submit" value="Crear Usuario">
  </form>


  <form action="usuarios/delete_menu.php" method="POST">
  <input type="submit" value="Borrar Usuario">
  </form>


  <form action="usuarios/update_menu.php" method="POST">
  <input type="submit" value="Modificar Usuario">
  </form>


  </body>
</html>
