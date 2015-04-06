<?php  
  
/*----------------------------------------------------------------------------
		Variables generales de configuración
----------------------------------------------------------------------------*/

$config['title']			= 'Amena pagos';
$config['charset']			= 'utf-8'; 
$config['icono']			= 'favicon.ico'; //Este icono debe estar en la carpeta 'doc' 


$config['remitente']		= 'INTERBANKING WEB';
$config['correo']			= 'amena@amena.com.ar';

$config['correos_error']	= array('diego.nieto@tmsgroup.com.ar');

$config['environment']		= 'development';
//$config['environment']		= 'testing';
//$config['environment']		= 'production';

date_default_timezone_set('America/Mendoza');
