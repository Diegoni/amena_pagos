<?php
include_once('menu.php');

include_once($route['models'].'m_config.php');

$config			= new m_Config();
$variable		= $config->get_registros('active = 1');

foreach ($variable as $row) {
	$datos_post = $row;
}
?>
<script>
	$(function() {
		$( "#FechaPago01" ).datepicker({
			maxDate: '0',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd-mm-yy'
		});
	});
</script>

<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<form method="post" target="_blank" action="<?php echo decrypt($datos_post['url_preconfeccion'])?>" onsubmit="return validar_preconfeccion();">
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo decrypt($datos_post['cuil'])?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo decrypt($datos_post['Nombre_usuario'])?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo decrypt($datos_post['Clave'])?>">
					<input type='hidden' name="CodigoComunidad" id="CodigoComunidad" value="<?php echo decrypt($datos_post['id_comunidad'])?>">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['cuil'] ?>
						</label>
						<div class="col-sm-10">
							<input type='number' class="form-control" name="ClienteCuit" id="ClienteCuit" placeholder="<?php echo $language['ingrese']." ".$language['cuil']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['cantidad'] ?>
						</label>
						<div class="col-sm-10">
							<input type='number' class="form-control" name="CantidadTransacciones" id="CantidadTransacciones" placeholder="<?php echo $language['ingrese']." ".$language['cantidad']?>" value="1" disabled required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['fecha'] ?>
						</label>
						<div class="col-sm-10">
							<div class="input-group">
								<input type='text' onkeypress="return false" class="form-control" name="FechaPago01" id="FechaPago01" placeholder="<?php echo $language['ingrese']." ".$language['fecha']?>" required>
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['comprobante'] ?>
						</label>
						<div class="col-sm-10">
							<input type='text' class="form-control" name="Comprobante01" id="Comprobante01" placeholder="<?php echo $language['ingrese']." ".$language['comprobante']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['importe'] ?>
						</label>
						<div class="col-sm-10">
							<div class="input-group">
								<input type='text' class="form-control" name="Importe01" id="Importe01" placeholder="<?php echo $language['ingrese']." ".$language['importe']?>" required>
								<div class="input-group-addon"><i class="fa fa-money"></i></div>
							</div>
						</div>
					</div>
					
			</div>
					<div class="well">
						<center>
							<button type='submit' class='btn btn-info btn-lg' name='guardar' id='guardar'>
								<?php echo $language['generar_preconfeccion'] ?>
								<i class='fa fa-arrow-right'></i>
							</button>
						</center>
					</div> 
				</form>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>