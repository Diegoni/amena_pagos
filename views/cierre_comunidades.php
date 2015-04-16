<?php
include_once('menu.php');
include_once('simple_html_dom.php');
include_once($route['models'].'m_config.php');

$config			= new m_Config();

$variable		= $config->get_registros('active = 1');

foreach ($variable as $row)
{
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
				<form method="post" action="<?php echo BASE_URL.'views/cierre_comunidades.php'?>">
					<!--
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo decrypt($datos_post['cuil'])?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo decrypt($datos_post['Nombre_usuario'])?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo decrypt($datos_post['Clave'])?>">
					<input type='hidden' name="Comunidad" id="Comunidad" value="<?php echo decrypt($datos_post['id_comunidad'])?>">
					-->
					<?php 
					echo set_alert("<i class='fa fa-question-circle'></i> ".$language['info_cierre'], 'default');
					echo "<button type='submit' class='btn btn-info btn-lg' id='mostrar' name='mostrar' value='1'>".$language['generar_cierre']." <i class='fa fa-arrow-right'></i></button>"; 
					?>
				</form>
			</div>
		</div>
		<?php 
		if(isset($_POST['mostrar']))
		{
			$html = file_get_html(decrypt($datos_post['url_cierre_comunidad'])."?Pais=".$datos_post['id_pais']."&cuil=".decrypt($datos_post['cuil'])."&Nombre_usuario=".decrypt($datos_post['Nombre_usuario'])."&Clave=".decrypt($datos_post['Clave'])."&Comunidad=".decrypt($datos_post['id_comunidad'])."");
								
			$pos = strpos($html, "ERROR (Error 40040) El cierre no fue confeccionado.");
				
			if ($pos === false) 
			{
			    echo set_alert($language['cierre_no'], 'danger');
			}
			else 
			{
			    echo set_alert($language['cierre_ok'], 'success');
			}
		}
		?>
	</div>
</div>

<?php
include_once('footer.php');
?>