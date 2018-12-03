<?php session_start() ?>

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

<a href="../../home.php">Volver al menu</a>
<a href="../../login.html">Volver al login</a>


</body>
</html>
