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


</table>

</body>
</html>
