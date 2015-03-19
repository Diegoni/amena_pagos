<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('../config/includes.php');
include_once($route['models'].'m_transaccion.php');
include_once($route['helpers'].'h_form.php');

$validacion = array(
	'cuit'		=> validation_form($_GET['cuit'],		array('int', 'length[11]', 'required')),
	'importe'	=> validation_form($_GET['importe'],	array('float', 'required')),
	'periodo'	=> validation_form($_GET['periodo'],	array('date[m/Y]', 'required')),
	'fechapago'	=> validation_form($_GET['fechapago'],	array('date[d/m/Y]', 'required')),
	'comprob'	=> validation_form($_GET['comprob'],	array('text', 'required', 'min_length[0]')),
	'token'		=> validation_form($_GET['token'],		array('text', 'required', 'min_length[0]')),
);

foreach ($validacion as $key => $value) {
	if($value !== TRUE)
	{
		foreach ($value as $error) {
			echo $key." ".$error."<br>";	
		}
	}
}

$datos = array(
	'cuit'		=> $_GET['cuit'],
	'importe'	=> $_GET['importe'],
	'periodo'	=> "'".$_GET['periodo']."'",
	'fechapago'	=> "'".date('Y-m-d', strtotime($_GET['fechapago']))."'",
	'comprob'	=> "'".$_GET['comprob']."'",
	'token'		=> $_GET['token'],
);

$tra	= new m_Transaccion();
$id_insert = $tra->insert($datos);
$user	=  $tra->get_registros();




 


