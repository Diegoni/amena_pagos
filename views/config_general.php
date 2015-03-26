<?php
include_once('menu.php');
include_once($route['models'].'m_config_certificado.php');
include_once($route['models'].'m_config.php');

$config_certificado			= new m_config_certificado();
$config						= new m_config();

if(isset($_POST['guardar']))
{
	$datos = array(
		'id_config_certificado'		=> $_POST['certificado']
	);
	
	$config->update($datos, $_POST['guardar']);
	$mensaje = set_alert($language['update_ok']);
}

$array_certificados			= $config_certificado->get_registros();
$array_config				= $config->get_registros('active = 1');

foreach ($array_config as $value) 
{
	$id_certificado = $value['id_config_certificado'];
	$id_config		= $value['id_config'];
}
?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							<?php echo $language['certificado'] ?>
						</label>
						<div class="col-sm-10">
							<select class="form-control" id="certificado" name="certificado">
								<?php
									foreach ($array_certificados as $value) 
									{
										if($value['id_certificado'] == $id_certificado)
										{
											echo "<option value=".$value['id_certificado']." selected> ".$value['certificado']."</option>";
										}
										else
										{
											echo "<option value=".$value['id_certificado']."> ".$value['certificado']."</option>";	
										}								
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default" name="guardar" value="<?php echo $id_config?>">
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