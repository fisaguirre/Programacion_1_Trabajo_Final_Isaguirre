<?php
header("Content-disposition: attachment; filename=registro.txt");
header("Content-type: MIME");
readfile("registro.txt");
?>
