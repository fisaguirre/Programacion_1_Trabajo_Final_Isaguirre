<?php session_start() ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <form action="administracion_usuarios.php" method="POST">

<?php


if($_SESSION['admin']!=1){
    header('Location: login.html');
}
if($_SESSION['admin']=0){
    header('Location: usuario.php');
}


?>
<input type="submit" value="Usuarios">

  <form action="administracion_auditoria.php" method="POST">

<?php
echo "<br>";



//registrar usuarios
//borrar usuarios
//modificar usuarios
//read usuarios search
//auditoria search

?>
<input type="submit" value="Auditoria">




  </body>
</html>
