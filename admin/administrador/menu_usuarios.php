<html lang="en" dir="ltr">
  <head>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../css/create.css" rel="stylesheet" type="text/css"/>
<link href="../css/table_read.css" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php session_start() ?>

<?php 

if($_SESSION['admin']!=1){
  header('Location: ../login.html');
}
?>

<form action="usuarios/menu_crud.php" method="POST">

<div class="container">

    <h1>Menu Usuario</h1>
    <hr>
<div class="clearfix">
<button type="submit" name="read" value="read" class="signupbtn">Leer Registros</button>

  <button type="submit" value="search" name="search">Buscar Registro</button>

  <button type="submit" value="read" class="signupbtn" name="create">Crear Usuario</button>

  <button type="submit" value="delete" class="signupbtn" name="delete">Borrar Usuario</button>


  <button type="submit" value="update" class="signupbtn" name="update">Modificar Usuario</button>

      <button type="button" onClick='location.href="menu_usuarios.php"'>Menu Usuarios</button>
      <button type="button" onClick='location.href="../home.php"'>HOME</button>
      <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>
      

      
    </div>
    </div>

  </form>





<?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: ../login.html');
}
?>



  </body>
</html>
