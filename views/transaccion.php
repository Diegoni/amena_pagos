<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('../config/includes.php');
include_once($route['models'].'m_transaccion.php');
include_once($route['models'].'m_log_error_transaccion.php');
include_once($route['helpers'].'h_form.php');


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
	$id_insert	= $c_tra->insert($datos);
	
	// Abrir el certificado
	$p12cert	= array();
	$file		= $route['doc'].'amena_2.p12';
	$pass		= "1234";
	$fd			= fopen($file, 'r');
	$p12buf		= fread($fd, filesize($file));
	
	echo $p12buf;
		
	fclose($fd);
	
	echo "<h1>Mi Primer Test</h1>";
	if (openssl_pkcs12_read($p12buf, $p12cert, $pass))
	{
		echo "Funciona";
	}
	else
	{
		echo "No funciona";
	}
	
	$privatekey	= $p12cert["pkey"];
	$res		= openssl_pkey_new();
	openssl_pkey_export($res, $p12cert["pkey"]);
	$publickey	= openssl_pkey_get_details($res);
	$publickey	= $publickey["key"];

	echo "	<h2>Private Key:</h2>
				$privatekey
				<br>
			<h2>Public Key:</h2>
				$publickey
				<BR>";

	$cleartext = htmlentities('<center><b>Texto HTML</b></center>');

	echo "	<h2>Original:</h2>
				$cleartext
				<BR><BR>";

	openssl_public_encrypt($cleartext, $crypttext, $publickey);

	echo "	<h2>Encriptada:</h2>
				$crypttext
				<BR><BR>";

	$PK2		= openssl_get_privatekey($p12cert["pkey"]);

	$Crypted	= openssl_private_decrypt($crypttext,$Decrypted,$PK2);
	if (!$Crypted) {
		$MSG.="<p class='error'>Imposible desencriptar ($CCID).</p>";
	}else{
		echo "<h2>Desencriptada:</h2>" . $Decrypted;
	}
}

$c_tra->get_registros();


 


