<?php session_start() ?>

<?php 

if($_SESSION['admin']!=1){
  header('Location: ../../login.html');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


<form action="usuarios/menu_crud.php" method="POST">
<input type="submit" name="read" value="Leer Registros">
</form>


  <form action="usuarios/menu_crud.php" method="POST">
  <input type="submit" name="search" value="Buscar Registro">
  </form>

  <form action="usuarios/menu_crud.php" method="POST">
  <input type="submit" name="create" value="Crear Usuario">
  </form>


  <form action="usuarios/menu_crud.php" method="POST">
  <input type="submit" name="delete" value="Borrar Usuario">
  </form>


  <form action="usuarios/menu_crud.php" method="POST">
  <input type="submit" name="update" value="Modificar Usuario">
  </form>


  </body>
</html>
