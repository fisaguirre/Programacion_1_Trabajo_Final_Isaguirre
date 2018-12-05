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

    $admin_arr=array();
    $admin_arr["records"]=array();

   /*
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
        extract($row);

        $admin_item=array(
            "usuario_id" => $usuario_id,
            "nombre" => $nombre,
            "rol"=> $rol,
            "created" => $created,
            "updated" => $updated
        );
        array_push($admin_arr["records"], $admin_item);
    }
    */
    echo "<tr>";
    echo "<th> id</th>";
    echo "<th> nombre</th>";
    echo "<th> rol</th>";
    echo "<th> created</th>";
    echo "<th> updated</th>";
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
