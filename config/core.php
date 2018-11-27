<?php
//este script contiene la configuracion principal
//como la url de inicio y variables de paginacion

//establece el valor de una directiva de configuracion
ini_set('display errors',1);

//establece los errores de php que seran notificados
//E_ALL = son todos los errores
error_reporting(E_ALL);

$home_url="http://localhost/2018/Trabajo_Final/";

$page = isset($_GET['page']) ? $_GET['page'] : 1;

//Establecer registros por pagina
$registros_pagina=5;

$from_record_num = ($registros_pagina * $page) - $registros_pagina;

?>
