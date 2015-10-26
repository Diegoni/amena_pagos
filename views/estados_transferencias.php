<?php
include_once('menu.php');
include_once('simple_html_dom.php');
include_once($route['models'].'m_config.php');
include_once($route['models'].'m_estados_transferencia.php');
include_once($route['models'].'m_cliente.php');

$config			= new m_Config();
$estados		= new m_Estados_transferencia();
$cliente		= new m_Cliente();


$variable		= $config->get_registros('`active` = 1');
$estados_array	= $estados->get_registros('`delete` = 0');

foreach ($variable as $row){
	$datos_post = $row;
}
?> 
<script>
function mostrar(id_test){
		var id_test = id_test;
		alert(id_test);	
}

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
				<form method="post" onsubmit="return validar_estados()">
					<!-- Datos Obligatorios -->
					<input type='hidden' name="Pais" id="Pais" value="<?php echo $datos_post['id_pais']?>">
					<input type='hidden' name="cuil" id="cuil" value="<?php echo decrypt($datos_post['cuil'])?>">
					<input type='hidden' name="Nombre_usuario" id="Nombre_usuario" value="<?php echo decrypt($datos_post['Nombre_usuario'])?>">
					<input type='hidden' name="Clave" id="Clave" value="<?php echo decrypt($datos_post['Clave'])?>">
					<input type='hidden' name="Comunidad" id="Comunidad" value="<?php echo decrypt($datos_post['id_comunidad'])?>">
										
					<?php echo set_alert("<i class='fa fa-question-circle'></i> ".$language['info_estados'], 'default'); ?>
					<button type="button" class="btn btn-default show_hide">
						<?php echo $language['filtros'] ?> <i class="fa fa-chevron-down"></i>
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
								echo "<button type='submit' class='btn btn-info btn-lg' id='mostrar' name='mostrar' value='1'>".$language['generar_informe']."<i class='fa fa-arrow-right'></i></button>"; 
							?>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
			<?php 
		if(isset($_POST['mostrar']))
		{?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo $language['transferencias']?>
		</div>
		<div class="panel-body">
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $language['tabla']?></a></li>
					<li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo $language['detalle']?></a></li>
				</ul>
			</div>
			<div class="tab-content">
			<?php
  
/*----------------------------------------------------------------------------
		Obtnemos el XML
----------------------------------------------------------------------------*/
						
			$datos =	"Pais=".$datos_post['id_pais'];
			$datos .=	"&cuil=".decrypt($datos_post['cuil']);
			$datos .=	"&Nombre_usuario=".decrypt($datos_post['Nombre_usuario']);
			$datos .=	"&Clave=".decrypt($datos_post['Clave']);
			$datos .=	"&Comunidad=".decrypt($datos_post['id_comunidad']);
			
			$filtros =	"&ClienteCuit=".$_POST['ClienteCuit'];
			$filtros .=	"&VendedorCuit=".$_POST['VendedorCuit'];
			$filtros .=	"&ImporteDesde=".$_POST['ImporteDesde'];
			$filtros .=	"&ImporteHasta=".$_POST['ImporteHasta'];
			$filtros .=	"&FechaDesde=".$_POST['FechaDesde'];
			$filtros .=	"&FechaHasta=".$_POST['FechaHasta'];
			$filtros .=	"&OperacionDesde=".$_POST['OperacionDesde'];
			$filtros .=	"&OperacionHasta=".$_POST['OperacionHasta'];
			$filtros .=	"&Estado=".$_POST['Estado'];
			
			$html = file_get_html(decrypt($datos_post['url_estado_transferencia'])."?".$datos.$filtros);
			
			$xml = simplexml_load_string($html);
			$i = 0;
			$cabecera = '<tr>';

  
/*----------------------------------------------------------------------------
		Detalle de las transferencias
----------------------------------------------------------------------------*/

			
			echo '<div role="tabpanel" class="tab-pane" id="home">';
			
			if(isset($show)){
				foreach ($xml->children() as $segunda_gen) 
				{
					echo "<div class='row'>";
						echo "<div class='col-md-6'>";
						echo "<table class='table table-hover'>";
						$i = $i + 1;
					foreach ($segunda_gen->children() as $key => $value) 
					{					
						$linea = "<th class='key_xml'>".cambioCadena($key, $language)."</th>";
						
						echo $linea;
						
						if($i == 1)
						{
							if($key != 'observaciones')
								{
									$cabecera .= $linea;
								}	
						}					
						
						if($key == 'estado')
						{
							$key_estado		= $estados->get_registros("`estado` = '".$value."'");
							
							foreach ($key_estado as $row)
							{
								$descripcion_estado = "- ".$row['descripcion'];
								$title = $row['compensacion'];
							}
						}
						else
						{
							$descripcion_estado = '';
							$title = '';
						}
						
						
						if($key == 'importe')
						{
							$class = 'success';
							$value = set_format($value, 'importe');
						}
						else
						{
							$class = '';
						}
						
						if($key == 'clientecuit')
						{
							$show 		= 'show_'.$i;
							$profile 	= 'profile_'.$i;
							$cuil		= $value;
							$descripcion_estado = '<i class="fa fa-arrow-circle-right"></i>';
						}
						else
						{
							$action = '';		
						}
	
						echo "<td class='".$class."' id='".$show."' title='".$title."'>".$value." ".$descripcion_estado."</td>";
						echo "</tr>";
					}
	
					if(isset($show)){
					?>
					<script>
					$(document).ready(function() {
						$("#<?php echo $profile?>").hide();
					});
					
					$("#<?php echo $show?>").click(function(){
						$("#<?php echo $profile?>").toggle(
							"Explode"
						);
					});
					</script>
					<?php
					}
						echo "</table>";
						echo "</div>";
						echo "<div class='col-md-3 col-md-offset-1' id='".$profile."'>";
						$cliente_obj		= $cliente->get_registros('`cuil` = '.$cuil);
						
						if($cliente_obj)
						{
							foreach ($cliente_obj as $row)
							{
								$array_cliente = $row;
							}
							
							echo getProfile($array_cliente);	
						}
						else
						{
							echo set_alert($language['no_cliente'], 'warning');
						}
						
						echo "</div>";
					echo "</div>";
					echo "<hr>";
				}
			}else{
				echo "<script>";
				echo 	"$(document).ready(function() {";
				echo 		'$(".slidingDiv").hide();';
				echo 	"});";
				echo "</script>";
			}
			echo "</div>";
  
/*----------------------------------------------------------------------------
		Simple tabla
----------------------------------------------------------------------------*/
			
			
			echo '<div role="tabpanel" class="tab-pane active" id="profile">';
				echo "<div class='row'>";
					echo "<div class='col-md-12'>";
					echo "<table class='table table-hover' id='datatable' width='100%'>";
					echo "<thead>";
					echo $cabecera."</tr>";
					echo "</thead>";
					echo "<tbody>";
					foreach ($xml->children() as $segunda_gen) 
					{
						echo "<tr>";
						
						foreach ($segunda_gen->children() as $key => $value) 
						{
							if($key != 'observaciones')
							{
								echo "<td>".$value."</td>";
							}
						}
						
						echo "</tr>";
					}	
					echo "</tbody>";
			echo "</table>";
			echo "</div>";
			
			
			echo "</div>";
								
			$fichero = $route['doc']."backup/".date('Y-m-d H_i_s')." ".$language['estado']." ".$language['transferencias'].".xml";
			
			file_put_contents($fichero, $html);
			
			echo "</div>";
			echo "</div>";

		}
		?>
		</div>
	</div>
	</div>
</div>

<?php
include_once('footer.php');
?>