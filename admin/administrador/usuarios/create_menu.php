<html>
<head>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/create.css" rel="stylesheet" type="text/css"/>
<title></title>
</head>



<?php session_start(); ?>

<?php 

if($_SESSION['admin']!=1){
  header('Location: ../../login.html');
}
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
<body>
    


</table>
<a href="../menu_usuarios.php">Volver al menu</a>



<div class="row">
  <div class="col-lg-6">
    <button id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>

  </div>
</div>
<?php

/*
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
    */









if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: ../../login.html');
}
?>


</body>
</html>
