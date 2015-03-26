<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('../config/includes.php');

include_once($route['models'].'m_transaccion.php');
include_once($route['models'].'m_log_error_transaccion.php');
include_once($route['models'].'m_config.php');
include_once($route['models'].'m_config_certificado.php');

include_once($route['helpers'].'h_form.php');
include_once($route['helpers'].'h_certificado.php');


$c_tra			= new m_Transaccion();
$c_error_tra	= new m_log_error_Transaccion();

// Modificamos el formato del importe
$importe = transformar_importe($_GET['importe']);

$datos = array(
	'cuit'		=> $_GET['cuit'],
	'importe'	=> $importe,
	'periodo'	=> $_GET['periodo'],
	'fechapago'	=> date('Y/m/d', strtotime($_GET['fechapago'])),
	'comprob'	=> $_GET['comprob'],
	'token'		=> $_GET['token'],
);

// Validamos los datos.
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

// Si la validación es correcta insertamos los datos
if($bandera)
{
	$id_insert		= $c_tra->insert($datos);
	
	$config			= new m_Config();
	$config_cert	= new m_Config_certificado();
	
	$array_config	= $config->get_registros('active = 1');
	
	foreach ($array_config as $value) {
		$array_config_cert	= $config_cert->get_registros('id_certificado = '.$value['id_config_certificado']);
	}
	
	foreach ($array_config_cert as $value) {
		$certificado		= $value['certificado'];
	}
	
	if($certificado == 'PKCS#12')
	{
		set_pkcs($route['doc'].'amena_2.p12', "1234");
	}
	else
	if($certificado == 'X509v3')
	{
		set_X509($route['doc'].'Amena.cer', "Amena2015");
	}
	
}