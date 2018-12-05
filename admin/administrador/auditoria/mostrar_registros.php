<html>
<head>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../../css/create.css" rel="stylesheet" type="text/css"/>
<link href="../../css/table_read.css" rel="stylesheet" type="text/css"/>
<title></title>
</head>
<body>
<table border='1' id="customers">


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

if($_POST['read']){


$stmt = $auditoria->read();
$num = $stmt->rowCount();


if($num>0){

    $auditoria_arr=array();
    $auditoria_arr["records"]=array();

   
    echo "<tr>";
    echo "<th> auditoria_id</th>";
    echo "<th> fecha_acceso</th>";
    echo "<th> user</th>";
    echo "<th> response_time</th>";
    echo "<th> endpoint</th>";
    echo "<th> created</th>";
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
