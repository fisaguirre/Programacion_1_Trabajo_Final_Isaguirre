<html lang="en" dir="ltr">

<head>

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/create.css" rel="stylesheet" type="text/css" />
  <link href="css/table_read.css" rel="stylesheet" type="text/css" />
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
  <div class="container">
    <h1>Home</h1>
    <hr>
    <div class="clearfix">



      <form action="administrador/menu_usuarios.php" method="POST">

        <button type="submit" value="s" class="signupbtn" name="Usuarios">Usuarios</button>



      </form>

      <form action="administrador/menu_auditoria.php" method="POST">

        <button type="submit" value="s" class="signupbtn" name="Auditoria">Auditoria</button>



      </form>
      <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>
    </div>
  </div>


<?php
if($_GET['button1']){
  logout();
}
function logout(){
  session_unset();
  header('Location: login.html');
}
?>


</body>

</html>
