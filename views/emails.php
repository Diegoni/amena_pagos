<?php
include_once('menu.php');
include_once($route['models'].'m_email.php');

$registros			= new m_email();
$array_registros	= $registros->get_registros();

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
							<th class='col-md-2'><?php echo $language['remitente'];?></th>
							<th class='col-md-2'><?php echo $language['destinatario'];?></th>
							<th class='col-md-2'><?php echo $language['asunto'];?></th>
							<th class='col-md-3'><?php echo $language['alta'];?></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach($array_registros as $row)
					{
						echo "<tr>";
						echo "<td class='col-md-2'>".$row['remitente']."</td>";
						echo "<td class='col-md-2'>".$row['destinatario']."</td>";
						echo "<td class='col-md-2'>".$row['asunto']."</td>";
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