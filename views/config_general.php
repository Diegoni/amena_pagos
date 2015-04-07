<?php
include_once('menu.php');
include_once($route['models'].'m_config_certificado.php');
include_once($route['models'].'m_config.php');

$config_certificado			= new m_config_certificado();
$config						= new m_config();

if(isset($_POST['guardar']))
{
	$datos = array(
		'id_config_certificado'		=> $_POST['certificado'],
		'id_comunidad'				=> encrypt($_POST['id_comunidad']),
		'Nombre_usuario'			=> encrypt($_POST['Nombre_usuario']),
		'Clave'						=> encrypt($_POST['Clave']),
		'cuil'						=> encrypt($_POST['cuil']),
		'url_post'					=> encrypt($_POST['url_post']),
		'url_reporte'				=> encrypt($_POST['url_reporte']),
		'url_estado_transferencia'	=> encrypt($_POST['url_estado_transferencia']),
		'url_estado_incremental'	=> encrypt($_POST['url_estado_incremental']),
		'url_preconfeccion'			=> encrypt($_POST['url_preconfeccion'])
	);
	
	$config->update($datos, $_POST['guardar']);
	$mensaje = set_alert($language['update_ok']);
}

$array_certificados			= $config_certificado->get_registros();
$variable					= $config->get_registros('active = 1');

foreach ($variable as $row)
{
	$valores = $row;
}

?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" onsubmit="return validar_config();">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $language['general'] ?></a></li>
    					<li><a href="#tab2" data-toggle="tab"><?php echo $language['url'] ?></a></li>
					</ul>
  					
  					<div class="tab-content">
					
					<div class="tab-pane active" id="tab1">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['usuario'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="Nombre_usuario" name="Nombre_usuario" value="<?php echo decrypt($valores['Nombre_usuario'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['clave'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="Clave" name="Clave" value="<?php echo decrypt($valores['Clave'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['cuil'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="cuil" name="cuil" value="<?php echo decrypt($valores['cuil'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['certificado'] ?>
						</label>
						<div class="col-sm-10">
							<select class="form-control" id="certificado" name="certificado" required>
								<?php
									foreach ($array_certificados as $row) 
									{
										if($row['id_certificado'] == $id_certificado)
										{
											echo "<option value=".$row['id_certificado']." selected> ".$row['certificado']."</option>";
										}
										else
										{
											echo "<option value=".$row['id_certificado']."> ".$row['certificado']."</option>";	
										}								
									}
								?>
							</select>
						</div>
					</div>
					
					</div>
					
					<div class="tab-pane" id="tab2">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['post'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_post" name="url_post" value="<?php echo decrypt($valores['url_post'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['reporte'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_reporte" name="url_reporte" value="<?php echo decrypt($valores['url_reporte'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['estado']." ".$language['transferencia']; ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_estado_transferencia" name="url_estado_transferencia" value="<?php echo decrypt($valores['url_estado_transferencia'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['estado']." ".$language['incremental']; ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_estado_incremental" name="url_estado_incremental" value="<?php echo decrypt($valores['url_estado_incremental'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['pre-confeccion']; ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_preconfeccion" name="url_preconfeccion" value="<?php echo decrypt($valores['url_preconfeccion'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							<?php echo $language['id']." ".$language['comunidad'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="id_comunidad" name="id_comunidad" value="<?php echo decrypt($valores['id_comunidad'])?>" required>
						</div>
					</div>
					
					</div>
					</div>
					
					<br>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default btn-lg" name="guardar" value="<?php echo $valores['id_config']?>">
								<?php echo $language['guardar'] ?>
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