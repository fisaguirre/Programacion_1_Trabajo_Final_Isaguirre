<?php

$_SERVER['HTTP_REFERER'] = 'crud.php';////dirrecion de la pagina(si la hay)
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
include '../usuario/validate_token.php';

//$ep = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"] . $_SERVER["REQUEST_METHOD"];

if( ($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt'])) ) {
		if( isset($_GET['key']) ) {
				//if( isset($_GET['chofer_id']) || isset($_GET['apellido']) || isset($_GET['nombre']) || isset($_GET['documento'])) {
				include 'search.php';
				//$endpoint='http://localhost/2018/Trabajo_Final/chofer/read.php/';
				$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$nuevo=parse_url($url);
				$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
		}else{
				include 'read.php';
				$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$nuevo=parse_url($url);
				$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
				}
		}

		if($_SERVER['REQUEST_METHOD']==='POST'){
				include 'create.php';
				// $endpoint='http://localhost/2018/Trabajo_Final/chofer/create.php/';
				$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$nuevo=parse_url($url);
						$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
				}


		if($_SERVER['REQUEST_METHOD']==='PUT'){
				include 'update.php';
				$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$nuevo=parse_url($url);
						$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
		}
		if($_SERVER['REQUEST_METHOD']==='DELETE'){
				include 'delete.php';
				$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$nuevo=parse_url($url);
						$endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
		}
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);

include '../auditoria/create.php';

crear($name,$total_time,$endpoint);
?>