<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('../config/includes.php');
include_once($route['models'].'m_transaccion.php');



$datos = array(
	'cuit'		=> $_GET['cuit'],
	'importe'	=> $_GET['importe'],
	'periodo'	=> $_GET['periodo'],
	'fechapago'	=> $_GET['fechapago'],
	'comprob'	=> $_GET['comprob'],
	'token'		=> $_GET['token'],
);

$tra	= new m_Transaccion();
$tra->insert($datos);
$user	=  $tra->get_registros();

foreach ($user as $row) {
	echo $row['cuit']."<br>";
}
 


