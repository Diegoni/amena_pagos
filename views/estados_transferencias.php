<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('menu.php');

include_once($route['models'].'m_config.php');

include_once($route['helpers'].'h_form.php');


$config			= new m_Config();
$array_config	= $config->get_registros('active = 1');

foreach ($array_config as $value) {
		$datos_post = $value;
}

?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<form method="post" target="_blank" action="<?php echo $datos_post['url_estado_transferencia']?>" onsubmit="return control_datos()">
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo $datos_post['cuil']?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo $datos_post['Nombre_usuario']?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo $datos_post['Clave']?>">
					<input type='hidden' name="Comunidad" id="Comunidad" value="<?php echo $datos_post['id_comunidad']?>">
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