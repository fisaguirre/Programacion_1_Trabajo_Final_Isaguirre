<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
/*
$database=new Database();
$db=$database->getConnection();

$auditoria=new Auditoria($db);

$auditoria->$_POST['date1'];

*/

$database=new Database();
$db=$database->getConnection();

$auditoria=new Auditoria($db);

$auditoria->primera_fecha=$_POST['date1'];
$auditoria->segunda_fecha=$_POST['date2'];


$stmt=$auditoria->export();

$cantidad=$stmt->rowCount();

$arr_audi['records']=array();

if($cantidad>0){
  $archivo=fopen('registro.txt',"w+");

     echo "se creo el archivo";
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
    $arr[$i]=implode(",",$arr_audi['records'][$i]);
    echo "<br>";
  }
}
/*
for($i=0;$i<$cantidad;$i++){
    $arr[$i]=explode(",",$arr[$i]);
    echo "<br>";
}
*/

     for($e=0;$e<$cantidad;$e++){
      fwrite($archivo,' '.$arr[$e].PHP_EOL);
     }
     fclose($archivo);

     

}else{
  echo "no se creo";
}

?>




</table>
<a href="descargar.php">des</a>
  </body>
</html>


