<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start(); 
include_once('../config/includes.php'); 

include_once($route['models'].'m_usuario.php');
$usuario = new m_usuario();

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?php echo $route['libraries']?>main/css/login.css">
<head>
<body>
	<?php		
	if(isset($_POST['enviar'])) 
	{ 
		if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) 
		{
			$mensaje = $language['usuario_error']; 
		}
		else 
		{ 
			$usuario_nombre	= $_POST['usuario_nombre']; 
			$usuario_clave	= $_POST['usuario_clave']; 
			$usuario_clave	= md5($usuario_clave); 
				
			$query = "nombre ='".$usuario_nombre."' AND clave='".$usuario_clave."'";
			$array_registros = $usuario->get_registros($query);
				
			foreach ($array_registros as $value)
			{
				$array_usuario = $value;
			}
								
			if(isset($array_usuario))
			{
				if($array_usuario['active'] == 0)
				{
					$mensaje = $language['usuario_delete'];
				}
				else
				{
					$_SESSION['id_usuario']		= $array_usuario['id_usuario']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id 
					$_SESSION['nombre']			= $array_usuario["nombre"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre 
						
					$data = array(
						'last_login' => date('Y-m-d H:i:s')
					);
						
					$usuario->update($data,  $array_usuario['id_usuario']);
					header("Location: transacciones.php"); 
				}
					 
			}
			else
			{
				$mensaje = $language['no_connect'];
			}
		} 
	}
	else 
	{ 
		header("Location: acceso.php"); 
	}  
?>

	<div class="container">
		<div class="login-container">
			<div id="output"></div>
			<div class="avatar" style="background-image: url('<?php echo $route['doc']?>user.png');">
			</div>
			<div class="form-box">
				<div class="row">
					<div class="alert alert-danger" role="alert">
						<?php echo $mensaje ?>
					</div> 
					<a href="acceso.php" class="btn btn-default">
						<?php echo $language['reintentar']	;?>
					</a> 
				</div>
			</div>
		</div>
	</div> 
</body>
</html>