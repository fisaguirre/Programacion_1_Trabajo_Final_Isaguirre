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
    header('Location: login.html');
}
//session_unset();

?>

<form action="administrador/menu_usuarios.php" method="POST">
<input type="submit" value="Usuarios">
</form>

<form action="administrador/menu_auditoria.php" method="POST">
<input type="submit" value="Auditoria">

</form>

  </body>
</html>
