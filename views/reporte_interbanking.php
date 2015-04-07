<?php
include_once('menu.php');

include_once($route['models'].'m_config.php');

$config			= new m_Config();
$array_config	= $config->get_registros('active = 1');

foreach ($array_config as $row) {
	$datos_post = array(
		'url_reporte'			=> decrypt($row['url_reporte']),
		'id_comunidad'			=> decrypt($row['id_comunidad']),
		'CantidadTransacciones'	=> 1,
		'WindowPopUp'			=> true,
		'OutURL'				=> 1,
		'URL'					=> 1
	);		
}
?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<form method="post" target="_blank" action="<?php echo $datos_post['url_reporte']?>" onsubmit="return control_datos()">
					<input type='hidden' name="CodigoComunidad" id="CodigoComunidad" value="<?php echo $datos_post['id_comunidad']?>">
					<input type='hidden' name="CantidadTransacciones" id="CantidadTransacciones" value="<?php echo $datos_post['CantidadTransacciones']?>">
					<input type='hidden' name="WindowPopUp" id="WindowPopUp" value="<?php echo $datos_post['WindowPopUp']?>">
					<input type='hidden' name="OutURL" id="OutURL" value="<?php echo $datos_post['OutURL']?>">
					<input type='hidden' name="URL" id="URL" value="<?php echo $datos_post['URL']?>">
					<?php 
					echo set_alert("<i class='fa fa-question-circle'></i> ".$language['info_informe'], 'default');
					echo "<button type='submit' class='btn btn-info btn-lg' name='guardar' id='guardar'>".$language['generar_informe']."<i class='fa fa-arrow-right'></i></button>"; 
					?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>