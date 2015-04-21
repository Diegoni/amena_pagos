<?php
include_once('menu.php');
include_once($route['models'].'m_config_certificado.php');
include_once($route['models'].'m_config.php');

$config_certificado			= new m_config_certificado();
$config						= new m_config();

if(isset($_POST['guardar']))
{
	$datos = array(
		'id_config_certificado'		=> $_POST['id_config_certificado'],
		'id_cuentarecaudacion'		=> encrypt($_POST['id_cuentarecaudacion']),
		'id_comunidad'				=> encrypt($_POST['id_comunidad']),
		'Nombre_usuario'			=> encrypt($_POST['Nombre_usuario']),
		'Clave'						=> encrypt($_POST['Clave']),
		'cuil'						=> encrypt($_POST['cuil']),
		'url_post'					=> encrypt($_POST['url_post']),
		'url_reporte'				=> encrypt($_POST['url_reporte']),
		'url_estado_transferencia'	=> encrypt($_POST['url_estado_transferencia']),
		'url_estado_incremental'	=> encrypt($_POST['url_estado_incremental']),
		'url_preconfeccion'			=> encrypt($_POST['url_preconfeccion']),
		'url_cierre_comunidad'		=> encrypt($_POST['url_cierre_comunidad']),
		'url_interbanking'			=> encrypt($_POST['url_interbanking']),
		'certificado'				=> $_POST['certificado'],
	);
	
	$config->update($datos, $_POST['guardar']);
	$mensaje = set_alert($language['update_ok']);
}

if(isset($_POST['clave_privada']))
{
	$datos = array(
		'clave_privada'		=> encrypt($_POST['clave_privada']),
	);
	
	$config->update($datos, $_POST['guardar_clave']);
	$mensaje = set_alert($language['update_ok']);
}

$variable					= $config->get_registros('active = 1');

foreach ($variable as $row)
{
	$valores = $row;
}

if(isset($_FILES['certificado']))
{
	$id			= $valores['certificado'];
	$extension	= pathinfo($_FILES['certificado']['name']); 
	$extension	= ".".$extension['extension'];
	
	if( 
		$_FILES['certificado']['type'] == 'application/x-x509-ca-cert' ||
		$_FILES['certificado']['type'] == 'application/x-pkcs12' ||
		$_FILES['certificado']['type'] == 'application/octet-stream' 
		)
	{
		$_FILES['certificado']['name'] = $id.$extension;
  
		copy($_FILES['certificado']['tmp_name'],$route['doc'].$_FILES['certificado']['name']);
	  
		$certificado_nombre	= $_FILES['certificado']['name'];
		$certificado_tipo	= $_FILES['certificado']['type'];
		$certificado_size	= $_FILES['certificado']['size'];
	  
		$certificado = array(
			'certificado_nombre'	=> $certificado_nombre,
			'certificado_tipo'		=> $certificado_tipo,
			'certificado_size'		=> $certificado_size,
			'id_usuario'			=> $id
		);
		
		$mensaje = set_alert($language['upload_ok']);
		
		if($_FILES['certificado']['size'] > 100000)
		{
			$mensaje .= set_alert($language['control_size'], 'warning');
		}
	}
	else
	{
		$mensaje = set_alert($language['extension_error'], 'danger');
	}	
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
    					<li><a href="#tab3" data-toggle="tab"><?php echo $language['certificado'] ?></a></li>
					</ul>
  					
  					<div class="tab-content">
					
					<div class="tab-pane active" id="tab1">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['id_cuentarecaudacion'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="id_cuentarecaudacion" name="id_cuentarecaudacion" value="<?php echo decrypt($valores['id_cuentarecaudacion'])?>" required>
						</div>
					</div>	
						
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
						<label for="inputEmail3" class="col-sm-2 control-label">
							<?php echo $language['id']." ".$language['comunidad'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="id_comunidad" name="id_comunidad" value="<?php echo decrypt($valores['id_comunidad'])?>" required>
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
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['cierre']." ".$language['comunidad']; ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_cierre_comunidad" name="url_cierre_comunidad" value="<?php echo decrypt($valores['url_cierre_comunidad'])?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['url']." ".$language['interbanking']; ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="url_interbanking" name="url_interbanking" value="<?php echo decrypt($valores['url_interbanking'])?>" required>
						</div>
					</div>
					
					</div>
					
					<div class="tab-pane" id="tab3">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['certificado']; ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="certificado" name="certificado" value="<?php echo $valores['certificado']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">							
						</label>
						<div class="col-sm-10">
							<a class="btn btn-default" type="button" href="<?php echo $route['doc'].'Tutorial_Certificado.pdf'?>" target="_blank">
								<i class="fa fa-info-circle"></i> 
								<?php echo $language['ayuda']." ".$language['certificado']; ?>
							</a>
							
							<a class="btn btn-default" type="button" href="<?php echo $route['doc'].'aplicaciones/kse-51-setup.rar'?>" target="_blank">
								<i class="fa fa-download"></i> kse-51-setup.rar
							</a>
						</div>
					</div>	
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">							
						</label>
						<div class="col-sm-10">
							<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-upload"></i>
								<?php echo $language['subir']." ".$language['archivo']; ?>
							</button>
						</div>
					</div>	
					
					<div class="form-group">
						<label class="col-sm-2 control-label">							
						</label>
						<div class="col-sm-10">
							<button class="btn btn-default" type="button" data-toggle="modal" data-target="#primary_key">
								<i class="fa fa-upload"></i>
								<?php echo $language['clave_privada']; ?>
							</button>
						</div>
					</div>		
					
					</div>
					
					</div>
					
					<br>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info btn-lg" name="guardar" value="<?php echo $valores['id_config']?>">
								<i class="fa fa-floppy-o"></i> 
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


<!---------------------------------------------------------------------
		Modal
---------------------------------------------------------------------->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $language['subir']." ".$language['archivo']; ?></h4>
			</div>
			
			<div class="modal-body">
        		<form action="config_general.php" method="post" enctype="multipart/form-data">
				    <input type="file" name="certificado">
				    <br>
			</div>
			
      		<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<?php echo $language['cerrar'] ?>
				</button>
				<button type="submit" class ="btn btn-default">
					<?php echo $language['subir'] ?>
				</button>
				</form>
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="primary_key" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">
					<?php echo $language['clave_privada']; ?>
				</h4>
			</div>
			
			<div class="modal-body">
        		<form class="form-horizontal" action="config_general.php" method="post" enctype="multipart/form-data">
				   <div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['clave_privada']; ?>
						</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="clave_privada" rows="16" name="clave_privada" required></textarea>
						</div>
					</div>
			</div>
			
      		<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<?php echo $language['cerrar'] ?>
				</button>
				<button type="submit" class ="btn btn-default" name="guardar_clave" value="<?php echo $valores['id_config']?>">
					<?php echo $language['subir'] ?>
				</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>