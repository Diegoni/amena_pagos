<?php
include_once('menu.php');
include_once($route['models'].'m_transaccion.php');

$transaccion			= new m_transaccion();

if(isset($_GET['opcion'])){
	$opcion = 	$_GET['opcion'];
}else{
	$opcion = 	1;
}

$array_transacciones	= $transaccion->get_transacciones($opcion);
?>

<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 15px 15px;">
				<?php echo get_panel_heading();	?> - 
				<?php 
				if($opcion == 1){
					echo $language['nuevos'];
				}else if($opcion == 2){
					echo $language['conciliados'].' <i class="fa fa-check text-success"></i>';
				}else if($opcion == 4){
					echo $language['eliminados'].' <i class="fa fa-ban text-danger"></i>';
				}else{
					echo $language['todos'];
				}?>
				
				<div class="pull-right">
					<div class="btn-group">
	  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    					<?php echo $language['filtros'] ?> <span class="caret"></span>
	  					</button>
	  					<ul class="dropdown-menu">
	    					<li><a href="transacciones.php?opcion=1"><?php echo $language['nuevos'] ?></a></li>
	    					<li><a href="transacciones.php?opcion=2"><?php echo $language['conciliados'] ?></a></li>
	    					<li><a href="transacciones.php?opcion=3"><?php echo $language['todos'] ?></a></li>
	    					<li role="separator" class="divider"></li>
	    					<li><a href="transacciones.php?opcion=4"><?php echo $language['eliminados'] ?></a></li>
	  					</ul>
					</div>
					
					<div class="btn-group">
	  					<button type="submit" name="accion" value="eliminar" class="btn btn-danger
	    					<?php 
						 	if($opcion == 2 || $opcion == 4){
								echo 'disabled';
							}
							?>
						"><?php echo $language['eliminar'] ?></button> 
	    				<button type="submit" name="accion" value="conciliar" class="btn btn-success
	    					<?php 
						 	if($opcion == 2 || $opcion == 4){
								echo 'disabled';
							}
							?>
						"><?php echo $language['conciliar'] ?></button>
					</div>
				</div>
			</div>
			<div class="panel-body">
			<form method="post" action="update_transacciones.php">
				
				
				<table class="table table-striped table-hover" id="datatable" width='100%'>
					<thead>
						<tr>
							<?php 
							if($opcion == 1 || $opcion == 3){
								echo '<th ></th>';
							}
							?>
							<th class='col-md-2'><?php echo $language['cuil'];?></th>
							<th class='col-md-2'><?php echo $language['razon_social'];?></th>
							<th class='col-md-1'><?php echo $language['importe'];?></th>
							<th class='col-md-1'><?php echo $language['periodo'];?></th>
							<th class='col-md-2'><?php echo $language['fecha'];?></th>
							<th class='col-md-2'><?php echo $language['comprobante'];?></th>
							<th class='col-md-2'><?php echo $language['alta'];?></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if(is_array($array_transacciones))
					{
						foreach($array_transacciones as $row)
						{
							echo "<tr>";
							if($opcion == 1){
								echo '<th ><input type="checkbox" name="transaccion[]" value="'.$row['id_transaccion'].'"></th>';
							}else if($opcion == 3){
								if($row['conciliacion'] == 1){
									echo '<th title="'.$language['conciliados'].'"><i class="fa fa-check text-success"></i></th>';
								}else if($row['eliminado'] == 1){
									echo '<th title="'.$language['eliminados'].'"><i class="fa fa-ban text-danger"></i></th>';
								}else{
									echo '<th ><input type="checkbox" name="transaccion[]" value="'.$row['id_transaccion'].'"></th>';
								}
							} 
							echo "<td class='col-md-2'>".set_format($row['cuit'], 'cuit')."</td>";
							if(isset($row['razon_social'])){
								echo "<td class='col-md-2'><a href='clientes_abm.php?edit=".$row['id_cliente']."'>".$row['razon_social']."</a></td>";	
							}else{
								echo "<td class='col-md-2'> </td>";
							}
							echo "<td class='col-md-1'>".set_format($row['importe'], 'importe')."</td>";
							echo "<td class='col-md-1'>".$row['periodo']."</td>";
							echo "<td class='col-md-2'>".set_format($row['fechapago'], 'dateen')."</td>";
							echo "<td class='col-md-2'>".$row['comprob']."</td>";
							echo "<td class='col-md-2'>".set_format($row['date_add'], 'datetime')."</td>";
							echo "</tr>";
						}	
					}
					?>
					</tbody>
				</table>
			</form>	
			</div>
		</div>
	</div>
</div>



<?php
include_once('footer.php');
?>