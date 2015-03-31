<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
 
session_start();

header('Content-type: text/html; charset=utf-8'); 
include_once('../config/includes.php'); 

$datos = array(
	'asunto'			=> 'Problemas para acceder',
	'mensaje'			=> $_GET['mensaje'],
	'email_1'			=> $_GET['email'],
	'fecha'				=> date('Y-m-d H:i:s')
);

$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$cabeceras .= 'From: '.$config['remitente'].' <'.$config['correo'].'>' . "\r\n";

foreach ($config['correos_error'] as $key => $correo) {
	mail($correo, $datos['asunto'], $datos['mensaje'], $cabeceras);
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?php echo $route['libraries']?>main/css/login.css">
<head>
<body>

<div class="container">
	<div class="login-container">
		<div id="output"></div>
		<div class="avatar" style="background-image: url('<?php echo $route['doc']?>user.png');">
		</div>
		<div class="form-box">
			<div class="row">
				<div class="alert alert-success" role="alert">
					<?php echo $language['mensaje_enviado'] ?>
				</div>
			</div>		
			<p>
				<span>
					<a href="acceso.php" class="btn btn-default" type="submit" name="enviar" value="1">
						<?php echo $language['volver'] ?>
					</a>
				</span>
			</p>
		</div>
	</div>
</div> 

</body>
</html>

