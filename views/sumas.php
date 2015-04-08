<?php
include_once('menu.php');
include_once($route['models'].'m_transaccion.php');

$transaccion			= new m_transaccion();

if(isset($_POST['final']))
{
	$final			= date('Y-m-d', strtotime($_POST['final']));
	$inicio			= date('Y-m-d', strtotime($_POST['inicio']));
	$fechafinal		= new DateTime(date('Y-m-d', strtotime($_POST['final'])));
	$fechainicial	= new DateTime(date('Y-m-d', strtotime($_POST['inicio'])));
	$diferencia		= $fechainicial->diff($fechafinal);
	$meses			= ( $diferencia->y * 12 ) + $diferencia->m;
		
	for ($i=0; $i <= $meses; $i++)
	{
		$comienzo	= date('Y-m', strtotime("+".($i-1)." month", strtotime($inicio)));
		$termina	= date('Y-m', strtotime("+".$i." month", strtotime($inicio)));
		
		$suma_array = $transaccion->suma_transacciones($comienzo, $termina);
		
		foreach ($suma_array as $row)
		{
			if($row['suma'])
			{
				$suma_mes[] = round($row['suma'], 2);	
			}
			else
			{
				$suma_mes[] = 0;	
			}
		}
		$intervalo[]	= $termina;	
	}
}
?>

<script>
	$(function() {
		$( "#inicio" ).datepicker({
			maxDate: '0',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd-mm-yy', 
			onClose: function( selectedDate ) {
				$( "#final" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#final" ).datepicker({
			maxDate: '0',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd-mm-yy', 
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
				<form method="post" action="sumas.php">
					<div class="form-group">
						<label class="col-sm-1 control-label"><?php echo $language['inicio'] ?></label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<input type="text" class="form-control" id="inicio" name="inicio" placeholder="<?php echo $language['ingrese']." ".$language['inicio'] ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label"><?php echo $language['final'] ?></label>
						<div class="col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<input type="text" class="form-control" id="final" name="final" placeholder="<?php echo $language['ingrese']." ".$language['final'] ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-search"></i>
								<?php echo $language['buscar'] ?>
							</button>
						</div>
					</div>
				</form>
				<div id="grafico" style="min-width: 310px; height: 400px; margin-bottom: 35px;"></div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(function () {
    $('#grafico').highcharts({
    	chart: {
            //type: 'bar'
            type: 'column'
        },
        title: {
            text: '<?php echo $language['sumas'] ?>',
            x: -20 //center
        },
        subtitle: {
            text: '<?php echo $language['periodo'] ?>: <?php 
 						if(isset($_POST['final']))
						{
							echo "de ".$_POST['inicio']." a ".$_POST['final'];
						}
					?>',
            x: -20
        },
        xAxis: {
            categories: [
            <?php 
            foreach ($intervalo as $key => $value) {
				echo   "'".$value."',";
            }
			?>
            ]
        },
        yAxis: {
            title: {
                text: '<?php echo $language['cantidad'] ?>'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' $'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '<?php echo $language['transacciones'] ?>',
            data: [
            <?php 
            foreach ($suma_mes as $key => $value)
			{
				echo   $value.",";
            }
			?>
			]
        }]
    });
});
</script>

<?php
echo js_libreria($route['libraries'].'Highcharts-4.1.4/js/highcharts.js');
echo js_libreria($route['libraries'].'Highcharts-4.1.4/js/modules/exporting.js');
		
include_once('footer.php');
?>