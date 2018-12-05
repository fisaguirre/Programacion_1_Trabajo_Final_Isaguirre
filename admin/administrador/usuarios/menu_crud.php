<html>
<head>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../../css/create.css" rel="stylesheet" type="text/css"/>
<link href="../../css/table_read.css" rel="stylesheet" type="text/css"/>
<title></title>
</head>
<body>
<table border='1' id="customers">

<?php session_start(); ?>

<?php 

if($_SESSION['admin']!=1){
  header('Location: ../../login.html');
}
?>

<?php



include_once '../../../config/database.php';
include_once '../../objects/administrador.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);


if($_POST['read']){


$stmt = $admin->read();
$num = $stmt->rowCount();


if($num>0){

    $admin_arr=array();
    $admin_arr["records"]=array();

   
    echo "<tr>";
    echo "<th> id</th>";
    echo "<th> nombre</th>";
    echo "<th> rol</th>";
    echo "<th> created</th>";
    echo "<th> updated</th>";
    echo "</tr>";  
    while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";      
        foreach($fila as $fil){
          echo "<td>";
          echo $fil;
          echo $a;
          echo "</td>";
        }
        echo "</tr>";
      }
}else{
    echo "hola";
}
}


if($_POST['search']){

    ?>

    <form action="search.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Buscar Usuario</h1>
    <p>Ingrese el id del usuario que quiera buscar.</p>
    <hr>
    <input type="text" name="usuario_id" id="usuario_id">

    <button type="submit" name="dato" value="Buscar" class="signupbtn">Buscar Registro</button>

    <div class="clearfix">
    </div>
  </div>
</form>
    
    <?php

        
    }

if($_POST['create']){
    ?>



<form action="create.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Crear Usuario</h1>
    <p>Completa el formulario para crear un usuario.</p>
    <hr>

    <label for="nombre"><b>Nombre</b></label>
    <input type="text" placeholder="Ingrese Nombre" name="nombre" required>

    <label for="clave"><b>Clave</b></label>
    <input type="password" placeholder="Ingrese Clave" name="clave" required>  
  
    <label>
        <input type="radio" name="rol" value="administrador">
        <span>Administrador</span>
    </label>

    <label>
    <input type="radio" name="rol" value="usuario">
    <span>Usuario</span>
    </label>
    
    <div class="clearfix">
    <button type="submit" class="signupbtn">Crear usuario</button>
    </div>
  </div>
</form>


    


    <?php


}


if($_POST['delete']){

$stmt = $admin->read();
$num = $stmt->rowCount();


if($num>0){

    $var;
    echo "<tr>";
    echo "<th> id</th>";
    echo "<th> nombre</th>";
    echo "<th> rol</th>";
    echo "<th> created</th>";
    echo "<th> updated</th>";
    echo "<th> </th>";

    echo "</tr>";  
    while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";      
        foreach($fila as $fil){
          echo "<td>";
          echo $fil;
          $var=$fila['usuario_id'];
          echo "</td>";
        }
        echo "<td>";
         // echo "<button type=\"submit\" name=\"a\" value=\"a\">Eliminar";
          echo "<a href=\"delete.php?usuario_id=$var\">Eliminar<a>";
          echo "</td>";
        echo "</tr>";
      }
}else{
    echo "hola";
}



}

if($_POST['update']){


$stmt = $admin->read();
$num = $stmt->rowCount();

if($num>0){

    $var;
    echo "<tr>";
    echo "<th> id</th>";
    echo "<th> nombre</th>";
    echo "<th> rol</th>";
    echo "<th> created</th>";
    echo "<th> updated</th>";
    echo "<th> </th>";

    echo "</tr>";  
  
    while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";      
        foreach($fila as $fil){
          echo "<td>";
          echo $fil;
          $usuario_id=$fila['usuario_id'];
          $nombre=$fila['nombre'];
          $clave=$fila['clave'];
          $rol=$fila['rol'];
          
          echo "</td>";
        }
        echo "<td>";

        echo "<a href='update_menu.php?usuario_id=".$usuario_id."'>Modificar registro</a>";
       
         echo "</td>";

        echo "</tr>";
              
    }

}else{
    echo "hola";
}
}


?>
</table>

    <div class="container">

<div class="clearfix">
      <button type="button" onClick='location.href="../menu_usuarios.php"'>Menu Usuarios</button>
      <button type="button" onClick='location.href="../../home.php"'>HOME</button>
      <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>
      
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
