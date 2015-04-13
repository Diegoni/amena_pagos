<?php
include_once('menu.php');

include_once($route['models'].'m_config.php');

$config			= new m_Config();
$variable		= $config->get_registros('active = 1');

foreach ($variable as $row) {
	$datos_post = $row;
}
?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<form method="post" target="_blank" action="<?php echo decrypt($datos_post['url_estado_incremental'])?>" onsubmit="return control_datos()">
					<!-- Datos obligatorios -->
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo decrypt($datos_post['cuil'])?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo decrypt($datos_post['Nombre_usuario'])?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo decrypt($datos_post['Clave'])?>">
					<input type='hidden' name="Comunidad" id="Comunidad" value="<?php echo decrypt($datos_post['id_comunidad'])?>">
					
					<!-- Datos No obligatorios -->
					<input type='hidden' name="ClienteCuit" id="ClienteCuit" value="">
					<input type='hidden' name="VendedorCuit" id="VendedorCuit" value="">
					<input type='hidden' name="ImporteDesde" id="ImporteDesde" value="">
					<input type='hidden' name="ImporteHasta" id="ImporteHasta" value="">
					<input type='hidden' name="FechaDesde" id="FechaDesde" value="">
					<input type='hidden' name="FechaHasta" id="FechaHasta" value="">
					<input type='hidden' name="OperacionDesde" id="OperacionDesde" value="">
					<input type='hidden' name="OperacionHasta" id="OperacionHasta" value="">
					<input type='hidden' name="Estado" id="Estado" value="">
					
					<?php 
					echo set_alert("<i class='fa fa-question-circle'></i> ".$language['info_incremental'], 'default');
					echo "<button type='submit' class='btn btn-info btn-lg' name='guardar' id='guardar'>".$language['generar_incremental']."<i class='fa fa-arrow-right'></i></button>"; 
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>