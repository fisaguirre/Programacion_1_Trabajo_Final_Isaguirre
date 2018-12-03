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
<table border='1'>
<?php


include_once '../../../config/database.php';
include_once '../../objects/administrador.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);

$stmt = $admin->read();
$num = $stmt->rowCount();


if($num>0){

    $var;
    echo "<tr>";
    echo "<th> id</th>";
    echo "<th> nombre</th>";
    echo "<th> rol</th>";
    echo "<th> created</th>";
    echo "<th> updated</th>";
    echo "<th> </th>";

    echo "</tr>";  
    while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";      
        foreach($fila as $fil){
          echo "<td>";
          echo $fil;
          $var=$fila['usuario_id'];
          echo "</td>";
        }
        echo "<td>";
         // echo "<button type=\"submit\" name=\"a\" value=\"a\">Eliminar";
          echo "<a href=\"delete.php?usuario_id=$var\">Eliminar<a>";
          echo "</td>";
        echo "</tr>";
      }
}else{
    echo "hola";
}

?>

</table>

</body>
</html>
