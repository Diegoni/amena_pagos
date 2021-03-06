<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);	

include_once('../config/includes.php');

include_once($route['models'].'m_transaccion.php');
include_once($route['models'].'m_log_error_transaccion.php');
include_once($route['models'].'m_config.php');
include_once($route['models'].'m_config_certificado.php');

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
	
	foreach ($array_config as $row)
	{
		$url_post			= decrypt($row['url_post']);
		$id_comunidad		= decrypt($row['id_comunidad']);
		$array_config_cert	= $config_cert->get_registros('id_certificado = '.$row['id_config_certificado']);
	}
	
	foreach ($array_config_cert as  $row)
	{
		$certificado		= $row['certificado'];
	}
	
	if($certificado == 'PKCS#12')
	{
		set_pkcs($route['doc'].'Amena.cer', "seHnELgnr6bZU44b");
	}
	else
	if($certificado == 'X509v3')
	{
		set_X509($route['doc'].'Amena.cer', "seHnELgnr6bZU44b");
	}
	
	$datos_post = array(
		'CodigoComunidad'		=> $id_comunidad,
		'CantidadTransacciones'	=> 1,
		'WindowPopUp'			=> True,
		'Comprobante1'			=> $datos['comprob'],
		//'FechaPago1'			=> date('d/m/Y', strtotime($datos['fechapago'])),
		'FechaPago1'			=> date('d/m/Y'),
		'Importe1'				=> $datos['importe']
	);		
?>
<script>
	function control_datos()
	{
		if
		(
			($('#CodigoComunidad').value() != <?php echo $datos_post['CodigoComunidad']?>) ||
			($('#CantidadTransacciones').value() != <?php echo $datos_post['CantidadTransacciones']?>) ||
			($('#WindowPopUp').value() != <?php echo $datos_post['WindowPopUp']?>) ||
			($('#Comprobante1').value() != <?php echo $datos_post['Comprobante1']?>) ||
			($('#FechaPago1').value() != <?php echo $datos_post['FechaPago1']?>) ||
			($('#Importe1').value()	!= <?php echo $datos_post['Importe1']?>)	
		)
		{
			return false;	
		}
		else
		{
			return true;
		}
	}
	
	$(document).ready(function(){
		$('#guardar').click();	
		window.close();
	});
</script>
<div class="hidden"> 
	<form method="post" target="_blank" action="<?php echo $url_post?>" onsubmit="return control_datos()">
		<input type='hidden' name="CodigoComunidad" id="CodigoComunidad" value="<?php echo $datos_post['CodigoComunidad']?>">
		<input type='hidden' name="CantidadTransacciones" id="CantidadTransacciones" value="<?php echo $datos_post['CantidadTransacciones']?>">
		<input type='hidden' name="WindowPopUp" id="WindowPopUp" value="<?php echo $datos_post['WindowPopUp']?>">
		<input type='hidden' name="Comprobante1" id="Comprobante1" value="<?php echo $datos_post['Comprobante1']?>">
		<input type='hidden' name="FechaPago1" id="FechaPago1" value="<?php echo $datos_post['FechaPago1']?>">
		<input type='hidden' name="Importe1" id="Importe1" value="<?php echo $datos_post['Importe1']?>">
		<input type='hidden' name="Signature" id="Signature" value="<?php echo $datos_post['Importe1']?>">
		<input type='hidden' name="Identificador" id="Identificador" value="<?php echo $datos_post['Importe1']?>">
		<input type='hidden' name="urlErrorSignature" id="urlErrorSignature" value="<?php echo $datos_post['Importe1']?>">
		<input type="hidden" name="signature"
		value="MIICojAcBgoqhkiG9w0BDAEEMA4ECNJtHayqrlu6AgICAgSCAoDb9J5QRKrrIGaR
VAGlyPoRgB2bgmBzQd5IE4/0pOYbefDBYaWwlum3O7iR3A6PiqK43fqTM8jDT6aX
3L9WROFxS25OGd+VoqlY5aWSBHVB3uowRI0a5kfL+/4ZqnvqthBp9hgLKmKchOhn
7EuXhOXfjwFXg7B59Y3J6SZCildVaQ6MqybdmgLMf9aAOHtDiimqdWayV8De6PxC
PJzeFWfc/Dic9LfYJcHvEpm/GFMBEW7Np+QpXdFWEHCLpB7YtYycKxeZ5S6QtXkR
hMknlG8ojsALev/6mAZaCtWvdpj1DWvfs3q+JJFNMCRHBKusavPRlXDfiXWCiPOc
blw3rVJLBjjMxV+4bPaXhDARk6Roti4ExpVLWL/x3yNyv/6wyMPSj2AtYpMDDfcs
QDtppb/4rNHCq+Kag1vgSv0uaK7AQ1R1KIgKU7ABqZsJbTknjC6qPQXRUuswhpMP
9VzfjeJgh3XZKF9p2LePhqlUPzP6I2a8Pm7r1f0p5/VaXmfzzfIFsDFdHCLuaD4t
7Le1ZHUhg7nxmnv+/T9PqCNqRf6vfq+VB2C6ckIgHDtf2Do3r9dfEcb5adSKjueG
NTIwTb/FaHm9nnwlgWBPEUCv1BcJs2x+bRsGna5ldzPt4Omc/KtlPnpySrkESU75
RfKbaWJDW7LxAWuEgN3qxHMJgPWaCAFv4vqKxtocaF43FTp39TbxZNYFiJTPuIiH
cGL9bwnQccen8s0nceRJMb2WLnprObQVXCcbgijvBeFlDZI0jO+awXLhWttBeiSz
xvjnaUo56Ku7kV2UCl2r7ZROeSo3mwDCpGlItGu+YbcYwVgr519NCNZjhDsgcP/8
2lw8QoXi">
		<input type="submit" name="guardar" id="guardar" value="<?php echo $datos_post['CodigoComunidad']?>">
	</form>
</div>

<?php
}
else
{
	$back = "<button class='btn btn-danger btn-lg' type='button' onclick='history.back()' />".$language['volver']."</button>";
	echo set_alert("<center>".$language['error_dato']." <h4>".$log_error['dato']." </h4><br>".$language['problema']." :<h4>".$log_error['error']." </h4><br>".$back."</center>", 'danger');
}
?>