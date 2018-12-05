<html lang="en" dir="ltr">
  <head>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../../css/create.css" rel="stylesheet" type="text/css"/>
<link href="../../css/table_read.css" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


<?php session_start() ?>
<?php

if($_SESSION['admin']!=1){
    header('Location: ../../login.html');
}

?>

<form action="expo.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Exportar Auditoria</h1>
    <p>Seleccione las fechas.</p>
    <hr>

    <label for="date1"><b>Fecha 1</b></label>
    <input type="date" placeholder="Ingrese fecha 1" name="date1" required>

    <label for="date2"><b>Fecha 2</b></label>
    <input type="date" placeholder="Ingrese fecha 2" name="date2" required>  
  
    <div class="clearfix">
    <button type="submit" name="dato" class="signupbtn">Exportar Auditoria</button>
    </div>
  </div>
</form>



    <div class="container">

<div class="clearfix">

      <button type="button" onClick='location.href="../menu_auditoria.php"'>Menu Auditoria</button>
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
