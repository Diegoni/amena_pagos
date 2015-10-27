<?php
if(!isset($_POST['transaccion'])){
	header("Location: transacciones.php");	
}

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
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>  
			</div>
			<div class="panel-body">
			<form method="post" action="update_transacciones_ok.php">
				<table class="table table-striped table-hover" width='100%'>
					<thead>
						<tr>
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
							if(in_array($row['id_transaccion'], $_POST['transaccion']) ){
								echo "<tr>";
								echo '<input type="hidden" name="transaccion[]" value="'.$row['id_transaccion'].'">';
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
					}
					?>
					</tbody>
				</table>
				<input type="hidden" name="confirmar" value="ok" />
				
				<div> 
					<?php 
					if($_POST['accion'] == 'eliminar'){
						echo '<i class="fa fa-ban text-danger"></i> '.$language['confirm_eliminar_n'];	
					}else if($_POST['accion'] == 'conciliar'){
						echo '<i class="fa fa-check text-success"></i> '.$language['confirm_conciliar_n'];
					}
					?>
					<a href="transacciones.php" class="btn btn-danger">
						<?php 
						echo $language['cancelar'];
						?>
					</a>
					<button class="btn btn-success"  name="accion" value="<?php echo $_POST['accion']?>">
						<?php 
						echo $language['confirmar'];
						?>
					</button>
				</div>
			</form>	
			</div>
		</div>
	</div>
</div>



<?php
include_once('footer.php');
?>