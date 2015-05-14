<?php
include_once('menu.php');
include_once($route['models'].'m_email.php');
include_once($route['models'].'m_config.php');

$registros			= new m_email();
$configs			= new m_config();

$configs_array		= $configs->get_registros('active = 1');

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
		'id_cliente'		=> 0,
	);
	
	$registros->insert($datos);
		
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

if(isset($_GET['id']))
{
	$array_registros	= $registros->get_registros('id_email = '.$_GET['id']);	
}
else
{
	$array_registros	= $registros->get_registros();	
}

?>

<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<?php 
				if(isset($_GET['id']))
				{
					foreach($array_registros as $row)
					{
					?>
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['remitente'] ?>
							</label>
							<div class="col-sm-10">
								<input class="form-control" value="<?php echo $row['remitente'] ?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['destinatario'] ?>
							</label>
							<div class="col-sm-10">
								<input class="form-control" value="<?php echo $row['destinatario'] ?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['asunto'] ?>
							</label>
							<div class="col-sm-10">
								<input class="form-control" value="<?php echo $row['asunto'] ?>" disabled>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<?php echo $language['mensaje'] ?>
							</label>
							<div class="col-sm-10">
								<textarea class="ckeditor form-control" cols="80" id="mensaje" name="mensaje" rows="10" disabled>
									<?php echo $row['mensaje'] ?>
								</textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-sm-2 control-label">
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>" required>
							</label>
							<div class="col-sm-10">
								<a href="emails.php" class="btn btn-danger btn-lg">
									<?php echo $language['volver']?>
								</a>
							</div>
						</div>
					</form>
					<?php
					}
				}
				else
				{
				?>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-list"></i> <?php echo $language['general'] ?></a></li>
    				<li><a href="#tab2" data-toggle="tab"><i class="fa fa-plus-square"></i> <?php echo $language['nuevo'] ?></a></li>
    			</ul>
    			
   				<div class="tab-content">
					
				<div class="tab-pane active" id="tab1">
				<table class="table table-striped table-hover" id="datatable" width='100%'>
					<thead>
						<tr>
							<th class='col-md-2'><?php echo $language['remitente'];?></th>
							<th class='col-md-2'><?php echo $language['destinatario'];?></th>
							<th class='col-md-2'><?php echo $language['asunto'];?></th>
							<th class='col-md-3'><?php echo $language['alta'];?></th>
							<th class='col-md-1'><?php echo $language['abrir'];?></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if(is_array($array_registros))
					{
						foreach($array_registros as $row)
						{
							echo "<tr>";
							echo "<td class='col-md-2'>".$row['remitente']."</td>";
							echo "<td class='col-md-2'>".$row['destinatario']."</td>";
							echo "<td class='col-md-2'>".$row['asunto']."</td>";
							echo "<td class='col-md-3'>".set_format($row['date_add'], 'datetime')."</td>";
							echo "<td class='col-md-1'><a href='emails.php?id=".$row['id_email']."' class='btn btn-default'><i class='fa fa-folder-open'></i></a></td>";
							echo "</tr>";
						}
					}
					?>
					</tbody>
				</table>
				</div>
				
				<div class="tab-pane" id="tab2">
				<form class="form-horizontal" action="emails.php" method="post">
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
								<input type="email" class="form-control" id="destinatario" name="destinatario" value="" required>
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
					</div>
				</div>
				<?php 
				}
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