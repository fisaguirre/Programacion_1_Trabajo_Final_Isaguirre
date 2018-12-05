
<?php
$file="registro.txt";
if($file) {
  header("Content-Type: application/force-download");
  header("Content-Disposition: attachment; filename=".basename($file).";");
  readfile($file);
} else {
 echo 'Archivo no encontrado';
 }

?>