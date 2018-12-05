
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php session_start() ?>
<?php
if($_SESSION['admin']!=1){
    header('Location: login.html');
}

?>

<form action="administrador/menu_usuarios.php" method="POST">
<input type="submit" value="Usuarios">
</form>

<form action="administrador/menu_auditoria.php" method="POST">
<input type="submit" value="Auditoria">

</form>


<div class="row">
  <div class="col-lg-6">
    <button id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>

  </div>
</div>
<?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: login.html');
}
?>
 

</body>
</html>
