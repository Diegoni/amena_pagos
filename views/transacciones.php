<?php
include_once('menu.php');
include_once($route['models'].'m_transaccion.php');

$transaccion			= new m_transaccion();
$array_transacciones	= $transaccion->get_registros();

?>

<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover" id="datatable">
					<thead>
						<tr>
							<th class='col-md-2'>Cuit</th>
							<th class='col-md-2'>Importe</th>
							<th class='col-md-1'>Periodo</th>
							<th class='col-md-2'>Fecha pago</th>
							<th class='col-md-2'>Comprob</th>
							<th class='col-md-3'>Date_add</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach($array_transacciones as $row)
					{
						echo "<tr>";
						echo "<td class='col-md-2'>".set_format($row['cuit'], 'cuit')."</td>";
						echo "<td class='col-md-2'>".set_format($row['importe'], 'importe')."</td>";
						echo "<td class='col-md-1'>".$row['periodo']."</td>";
						echo "<td class='col-md-2'>".set_format($row['fechapago'], 'date')."</td>";
						echo "<td class='col-md-2'>".$row['comprob']."</td>";
						echo "<td class='col-md-3'>".set_format($row['date_add'], 'datetime')."</td>";
						echo "</tr>";
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<?php
include_once('footer.php');
?>