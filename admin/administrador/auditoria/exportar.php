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


<form action="expo.php" method="POST">

    <input type="date" name="date1">
    <input type="date" name="date2">
    <input type="submit" name="dato" value="Exportar">

</form>


<?php




?>



  </body>
</html>
