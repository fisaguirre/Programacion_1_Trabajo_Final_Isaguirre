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
<table border='1'>

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

    <form action="search.php" method="POST">

    <input type="text" name="usuario_id" id="usuario_id">
    <input type="submit" name="dato" value="Buscar">

    </form>
    
    <?php

        
    }

if($_POST['create']){
    ?>

    <form action="create.php" method="POST">
        <label for="nombre">Nombre Usuario: </label>
        <input type="text" name="nombre" id="nombre">
        <label for="clave">Clave: </label>
        <input type="password" name="clave" id="clave">  
        <label for="rol">Rol: </label>
        <select name="rol">
            <option value="usuario">Usuario</option>
            <option value="administrador">Administrador</option>
        </select>
        <input type="submit" name="datos" value="Crear Usuario">

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
