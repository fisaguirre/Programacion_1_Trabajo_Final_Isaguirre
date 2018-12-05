<html lang="en" dir="ltr">
  <head>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../../css/create.css" rel="stylesheet" type="text/css"/>
<link href="../../css/table_read.css" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border='1'>


<?php session_start() ?>
<?php
if($_SESSION['admin']!=1){
    header('Location: ../../login.html');
}
?>

<?php
include_once '../../objects/auditoria.php';
include_once '../../../config/database.php';

$database=new Database();
$db=$database->getConnection();
$auditoria=new Auditoria($db);

$auditoria->primera_fecha=$_POST['date1'];
$auditoria->segunda_fecha=$_POST['date2'];

$stmt=$auditoria->export();
$cantidad=$stmt->rowCount();

$arr_audi['records']=array();

$file="registro.txt";
if($cantidad>0){
  $archivo=fopen($file,"w+");


?>
  <div class="container">
    <h1>Se exporto con exito</h1>
    <hr>
    <div class="clearfix">
    </div>
  </div>

<?php

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $array=array(
        "auditoria_id"=>$auditoria_id,
        "user"=>$user,
        "fecha_acceso"=>$fecha_acceso,
        "endpoint"=>$endpoint,
        "created"=>$created
      );
      array_push($arr_audi['records'],$array);
     }
for($i=0;$i<$cantidad;$i++){
  foreach($arr_audi['records'] as $fila){
    $arr[$i]=implode(" ",$arr_audi['records'][$i]);
  }
}

     for($e=0;$e<$cantidad;$e++){
      fwrite($archivo,''.$arr[$e].','.PHP_EOL);
      
     }
     fclose($archivo);
     header('Location: descargar.php');

     
}else{
  ?>



  <div class="container">
    <h1>No se exporto</h1>
    <hr>

    <div class="clearfix">
    <button type="submit" name="dato" class="signupbtn">Exportar Auditoria</button>
    </div>
  </div>


<?php
}
?>




</table>


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