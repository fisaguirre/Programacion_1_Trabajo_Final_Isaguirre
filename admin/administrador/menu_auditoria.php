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


<form action="auditoria/mostrar_registros.php" method="POST">
<input type="submit" name='read' value="Mostrar Registros de Auditoria">
</form>

  <form action="auditoria/exportar.php" method="POST">
  <input type="submit" name='export' value="Exportar Auditoria">
  </form>

<?php


//registrar usuarios
//borrar usuarios
//modificar usuarios
//read usuarios search
//auditoria search

?>






  </body>
</html>
