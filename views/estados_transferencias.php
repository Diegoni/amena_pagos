<?php
include_once('menu.php');

include_once($route['models'].'m_config.php');
include_once($route['models'].'m_estados_transferencia.php');

$config			= new m_Config();
$estados		= new m_Estados_transferencia();
$variable		= $config->get_registros('`active` = 1');
$estados_array	= $estados->get_registros('`delete` = 0');

foreach ($variable as $row)
{
	$datos_post = $row;
}
?>

<script>
	$(function() {
		$( "#FechaDesde" ).datepicker({
			maxDate: '0',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd/mm/yy', 
			onClose: function( selectedDate ) {
				$( "#final" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#FechaHasta" ).datepicker({
			maxDate: '0',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd/mm/yy', 
			onClose: function( selectedDate ) {
				$( "#inicio" ).datepicker( "option", "maxDate", selectedDate );
			}
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
				<form method="post" target="_blank" action="<?php echo decrypt($datos_post['url_estado_transferencia'])?>" onsubmit="return validar_estados()">
					<!-- Datos Obligatorios -->
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo decrypt($datos_post['cuil'])?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo decrypt($datos_post['Nombre_usuario'])?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo decrypt($datos_post['Clave'])?>">
					<input type='hidden' name="Comunidad" id="Comunidad" value="<?php echo decrypt($datos_post['id_comunidad'])?>">
					
					<?php echo set_alert("<i class='fa fa-question-circle'></i> ".$language['info_estados'], 'default'); ?>
					<button type="button" class="btn btn-default show_hide">
						<?php echo $language['filtros'] ?>
					</button>
					
					<div class="slidingDiv">
					<!-- Datos No obligatorios -->
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['cliente'] ?> <?php echo $language['cuil'] ?>
						</label>
						<div class="col-sm-4">
							<input type='text' class="form-control" name="ClienteCuit" id="ClienteCuit" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['vendedor'] ?> <?php echo $language['cuil'] ?>
						</label>
						<div class="col-sm-4">
							<input type='text' class="form-control" name="VendedorCuit" id="VendedorCuit" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_importe'] ?>">
							<?php echo $language['importe'] ?> <?php echo $language['desde'] ?>
						</label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-money"></i></div>
								<input type='text' class="form-control" name="ImporteDesde" id="ImporteDesde" value="">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_importe'] ?>">
							<?php echo $language['importe'] ?> <?php echo $language['hasta'] ?>
						</label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-money"></i></div>
								<input type='text' class="form-control" name="ImporteHasta" id="ImporteHasta" value="">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_fecha'] ?>">
							<?php echo $language['fecha'] ?> <?php echo $language['desde'] ?>
						</label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<input type='text' class="form-control" name="FechaDesde" id="FechaDesde" value="">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_fecha'] ?>">
							<?php echo $language['fecha'] ?> <?php echo $language['hasta'] ?>
						</label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<input type='text' class="form-control" name="FechaHasta" id="FechaHasta" value="">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_operacion'] ?>">
							<?php echo $language['operacion'] ?> <?php echo $language['desde'] ?>
						</label>
						<div class="col-sm-4">
							<input type='number' min="1" class="form-control" name="OperacionDesde" id="OperacionDesde" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_operacion'] ?>">
							<?php echo $language['operacion'] ?> <?php echo $language['hasta'] ?>
						</label>
						<div class="col-sm-4">
							<input type='number' min="1" class="form-control" name="OperacionHasta" id="OperacionHasta" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" title="<?php echo $language['ayuda_estado'] ?>">
							<?php echo $language['estado'] ?>
						</label>
						<div class="col-sm-4">
							<select class="form-control" name="Estado" id="Estado">
								<option></option>
								<?php
								foreach ($estados_array as $row)
								{
									echo "<option value='".$row['estado']."'>".$row['descripcion']."</option>";
								}
								?>
							</select>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
					</div>
					
					
					<div class="form-group" >
						<div class="col-sm-4 col-md-offset-4" style="PADDING-TOP: 15px;">
							<?php 
								echo "<button type='submit' class='btn btn-info btn-lg' id='guardar'>".$language['generar_informe']."<i class='fa fa-arrow-right'></i></button>"; 
							?>
						</div>
					</div>
					
					
					
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>