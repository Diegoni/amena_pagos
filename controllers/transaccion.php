<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('../config/includes.php');

include_once($route['models'].'m_transaccion.php');
include_once($route['models'].'m_log_error_transaccion.php');
include_once($route['helpers'].'h_form.php');

if(isset(
	$_GET['importe'],
	$_GET['cuit'],
	$_GET['periodo'],
	$_GET['fechapago'],
	$_GET['comprob'],
	$_GET['token']))
{
	$c_tra			= new m_Transaccion();
	$c_error_tra	= new m_log_error_Transaccion();
	
	$importe = transformar_importe($_GET['importe']);
	
	$datos = array(
		'cuit'		=> $_GET['cuit'],
		'importe'	=> $importe,
		'periodo'	=> $_GET['periodo'],
		'fechapago'	=> date('Y/m/d', strtotime($_GET['fechapago'])),
		'comprob'	=> $_GET['comprob'],
		'token'		=> $_GET['token'],
	);
	
	
	$validacion = array(
		'cuit'		=> validation_form($datos['cuit'],		array('int', 'length[11]', 'required')),
		'importe'	=> validation_form($datos['importe'],	array('float', 'min_length[0]', 'required')),
		'periodo'	=> validation_form($datos['periodo'],	array('date[m/Y]', 'required')),
		'fechapago'	=> validation_form($datos['fechapago'],	array('date[Y/m/d]', 'required')),
		'comprob'	=> validation_form($datos['comprob'],	array('text', 'required', 'min_length[0]')),
		'token'		=> validation_form($datos['token'],		array('text', 'required', 'min_length[0]')),
	);
	
	$log_error = $datos;
	
	$bandera = TRUE;	
	
	foreach ($validacion as $key => $value) {
		
		if($value !== TRUE)
		{
			foreach ($value as $error) {
				$log_error['error']		= $error;
				$log_error['dato']		= $key;
				
				$id_insert = $c_error_tra->insert($log_error);
			}
			
			$bandera = FALSE;
		}
	}
	
	if($bandera)
	{
		$id_insert	= $c_tra->insert($datos);	
	}
	
	$c_tra->get_registros();
		
}
else
{
	
}
