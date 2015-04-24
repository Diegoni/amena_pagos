<?php
if(!isset($_GET['id']) && !isset($_POST['id']))
{
	header("Location: clientes_abm.php");	
}
else
{
	if(isset($_GET['id']))
	{
		$id_cliente = $_GET['id'];
	}
	else
	{
		$id_cliente = $_POST['id'];
	}
}

include_once('menu.php');
include_once($route['models'].'m_cliente.php');
include_once($route['models'].'m_config.php');
include_once($route['models'].'m_email.php');

$cliente			= new m_cliente();
$configs			= new m_config();
$emails				= new m_email();

$cliente_array		= $cliente->get_registros('id_cliente ='.$id_cliente);
$configs_array		= $configs->get_registros('active = 1');

foreach ($cliente_array as $fila) 
{
	$row = $fila;
}

foreach ($configs_array as $fila) 
{
	$row_config = $fila;
}

 
/*----------------------------------------------------------------------------
		Envio de correo
----------------------------------------------------------------------------*/


if(isset($_POST['remitente']))
{
	$datos = array(
		'remitente'			=> $_POST['remitente'],
		'destinatario'		=> $_POST['destinatario'],
		'asunto'			=> $_POST['asunto'],
		'mensaje'			=> $_POST['mensaje'],
		'id_cliente'		=> $_POST['id'],
	);
	
	$emails->insert($datos);
	
	
	// Para enviar un correo HTML
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$cabeceras .= 'From: '.$_POST['asunto'].' <'.$_POST['remitente'].'>' . "\r\n";
	
	$mail = array(
		'para'				=> $_POST['destinatario'],
		'titulo'			=> $_POST['asunto'],
		'mensaje'			=> $_POST['mensaje'],
		'cabecera'			=> $cabeceras,
	);
		
	mail($mail['para'], $mail['titulo'], $mail['mensaje'], $mail['cabecera']);
	
	$mensaje = set_alert($language['email_ok']);
}
?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				
					<form class="form-horizontal" action="enviar_correo.php" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['remitente'] ?>
							</label>
							<div class="col-sm-10">
								<input class="form-control" id="remitente" name="remitente" value="<?php echo $row_config['email'] ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['destinatario'] ?>
							</label>
							<div class="col-sm-10">
								<input class="form-control" id="destinatario" name="destinatario" value="<?php echo $row['email'] ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['asunto'] ?>
							</label>
							<div class="col-sm-10">
								<input class="form-control" id="asunto" name="asunto" value="<?php echo $row_config['asunto'] ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['mensaje'] ?>
							</label>
							<div class="col-sm-10">
								<textarea class="ckeditor form-control" cols="80" id="mensaje" name="mensaje" rows="10">
									<br>
									<hr>
									<?php echo $row_config['firma_email'] ?>
								</textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>" required>
							</label>
							<div class="col-sm-10">
								<button class="btn btn-info btn-lg">
									<i class="fa fa-envelope-o"></i> <?php echo $language['enviar']?>
								</button>
							</div>
						</div>
					</form>
					<?php 
					if(isset($mensaje))
					{
						echo $mensaje;
					}
					?>
			</div>
		</div>
	</div>
</div>


<?php
include_once('footer.php');
?>