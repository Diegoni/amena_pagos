<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);	

include_once('../config/includes.php');

include_once($route['models'].'m_transaccion.php');
include_once($route['models'].'m_log_error_transaccion.php');
include_once($route['models'].'m_config.php');

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
	
	$array_config	= $config->get_registros('active = 1');
	
	foreach ($array_config as $row)
	{
		$url_post			= decrypt($row['url_post']);
		$id_comunidad		= decrypt($row['id_comunidad']);
		$private_key		= decrypt($row['clave_privada']);
		$cuentarecaudacion	= decrypt($row['id_cuentarecaudacion']);
	}
		
	$datos_post = array(
		'CodigoComunidad'		=> $id_comunidad,
		'CantidadTransacciones'	=> 1,
		'WindowPopUp'			=> True,
		'Comprobante1'			=> $datos['comprob'],
		'OutUrl'				=> '',
		'FechaPago1'			=> date('d/m/Y', strtotime($datos['fechapago'])),
		'Importe1'				=> $datos['importe'],
		'Observacion1'			=> '',
		'CuentaRecaudacionId1'	=> $cuentarecaudacion,
		'urlErrorSignature'		=> '',
		'AtraparErrores'		=> '',
		'actionUrl'				=> '',
	);	
	
	
	$data = $datos_post['CodigoComunidad'].$datos_post['CantidadTransacciones'].$datos_post['WindowPopUp'].$datos_post['OutUrl'].$datos_post['FechaPago1'].$datos_post['Comprobante1'].$datos_post['Importe1'].$datos_post['CuentaRecaudacionId1'].$datos_post['Observacion1'];
	
	// Firma digital y codificación en base 64
	openssl_sign($data, $signature, $private_key);
	$signature_64 = base64_encode($signature);
		
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
	<form method="post" action="<?php echo $url_post ?>">
		<input type="hidden" name="signature" value="<?php echo $signature_64;?>">
		<input type="hidden" name="CodigoComunidad" value="<?php echo $datos_post['CodigoComunidad']?>">
		<input type="hidden" name="CantidadTransacciones" value="<?php echo $datos_post['CantidadTransacciones']?>">
		<input type="hidden" name="WindowPopUp" value="<?php echo $datos_post['WindowPopUp']?>">
		<input type="hidden" name="OutUrl" value="<?php echo $datos_post['OutUrl']?>">
		<input type="hidden" name="FechaPago1" value="<?php echo $datos_post['FechaPago1']?>">
		<input type="hidden" name="Comprobante1" value="<?php echo $datos_post['Comprobante1']?>">
		<input type="hidden" name="Importe1" value="<?php echo $datos_post['Importe1']?>">
		<input type="hidden" name="CuentaRecaudacionId1" value="<?php echo $datos_post['CuentaRecaudacionId1']?>">
		<input type="hidden" name="Observacion1" value="<?php echo $datos_post['Observacion1']?>">
		<input type="hidden" name="urlErrorSignature" value="<?php echo $datos_post['urlErrorSignature']?>">
		<input type="hidden" name="AtraparErrores" value="<?php echo $datos_post['AtraparErrores']?>">
		<input type="hidden" name="actionUrl" value="<?php echo $datos_post['actionUrl']?>">
		<input type="submit" name="guardar" id="guardar" value="enviar">
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