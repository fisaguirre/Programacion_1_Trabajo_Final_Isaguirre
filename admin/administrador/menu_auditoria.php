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


    <div class="container">

<div class="clearfix">

<form action="auditoria/mostrar_registros.php" method="POST">
<button type="submit" name="read" value="Buscar" class="signupbtn">Mostrar Registros de Auditoria</button>

</form>



  <form action="auditoria/exportar.php" method="POST">
  <button type="submit" name="export" value="Buscar" class="signupbtn">Exportar Auditoria</button>
  </form>

      <button type="button" onClick='location.href="../home.php"'>HOME</button>
      <button type="button" class="cancelbtn" id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>
      
    </div>
</div>


<?php
if($_GET['button1']){logout();}
function logout(){
session_unset();
header('Location: ../login.html');
}
?>




  </body>
</html>
