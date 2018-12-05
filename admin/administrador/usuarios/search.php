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

$admin->usuario_id=$_POST['usuario_id'];

$stmt=$admin->search();

$num = $stmt->rowCount();

echo "<th>Usuario_id </th>";
echo "<th>Nombre </th>";
echo "<th>Rol </th>";
echo "<th> Created </th>";
echo "<th> Updated </th>";

if($num>0){
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    echo "<tr>";

    foreach($row as $fa){
        echo "<td>";
        echo $fa;
        echo "</td>";
    }
    echo "</tr>";

}else{
    echo "No hay ningun registro";
}



/*
$admin->usuario_id=$_POST['usuario_id'];

$stmt = $admin->search();

$num = $stmt->rowCount();

if($num>0){
    echo "mayor";
}else{
    echo "menor";
}
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    foreach($row as $fa){
        echo "<tr>";
        echo "<td>";
        echo $row['nombre'];
        echo "</td>";
        echo "</tr>";
    }
}
*/
/*
if($num>0){
echo "el num es mayor a cero";
$row=$stmt->fetch(PDO::FETCH_ASSOC);


foreach($row as $fil){

    echo "<tr>";
    echo "<td>";
    echo $fil;
    echo "</td>";
    echo "</tr>";
}   
}else{
    echo "no es mayor";
}
    */


?>



</table>
<a href="../menu_usuarios.php">Volver al menu</a>


<div class="row">
  <div class="col-lg-6">
    <button id="btnlogout" name="btnlogout" onClick='location.href="?button1=1"'>Logout</button>

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
