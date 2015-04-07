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
				<form method="post" target="_blank" action="<?php echo decrypt($datos_post['url_estado_transferencia'])?>" onsubmit="return control_datos()">
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo decrypt($datos_post['cuil'])?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo decrypt($datos_post['Nombre_usuario'])?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo decrypt($datos_post['Clave'])?>">
					<input type='hidden' name="Comunidad" id="Comunidad" value="<?php echo decrypt($datos_post['id_comunidad'])?>">
					<?php 
					echo set_alert("<i class='fa fa-question-circle'></i> ".$language['info_estados'], 'default');
					echo "<button type='submit' class='btn btn-info' name='guardar' id='guardar'>".$language['generar_informe']."<i class='fa fa-arrow-right'></i></button>"; 
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>