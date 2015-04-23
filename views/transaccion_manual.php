<?php
include_once('menu.php');
?>
<script>
	$(function() {
		$( "#fechapago" ).datepicker({
			minDate: '1',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'dd/mm/yy'
		});
		
		$( "#periodo" ).datepicker({
			maxDate: '0',
			changeMonth: true,
      		changeYear: true,
			dateFormat: 'mm/yy'
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
				<form method="get" action="transaccion.php" onsubmit="armarToken() return">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['cuil'] ?>
						</label>
						<div class="col-sm-10"> 
							<input type="number" class="form-control" name="cuit" id="cuit" placeholder="<?php echo $language['ingrese']." ".$language['cuil']?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['importe'] ?>
						</label>
						<div class="col-sm-10"> 
							<div class="input-group">
								<input type="text" onkeypress="return solo_numeros(event)" class="form-control" name="importe" id="importe" placeholder="<?php echo $language['ingrese']." ".$language['importe']?>">
								<div class="input-group-addon"><i class="fa fa-money"></i></div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['periodo'] ?>
						</label>
						<div class="col-sm-10"> 
							<div class="input-group">
								<input type="text" onkeypress="return false" class="form-control" name="periodo" id="periodo" placeholder="<?php echo $language['ingrese']." ".$language['periodo']?>">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['fecha'] ?>
						</label>
						<div class="col-sm-10"> 
							<div class="input-group">
								<input type="text" onkeypress="return false" class="form-control" name="fechapago" id="fechapago" placeholder="<?php echo $language['ingrese']." ".$language['fecha']?>">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['comprobante'] ?>
						</label>
						<div class="col-sm-10"> 
							<input type="number" class="form-control" name="comprob" id="comprob" placeholder="<?php echo $language['ingrese']." ".$language['comprobante']?>">
						</div>
					</div>
					
					<input type="hidden" class="form-control" name="token" id="token">
		
					
					<div class="form-group ">
						<label class="col-sm-2 control-label">
						</label>
						<div class="col-sm-10" style="padding-top: 15px;"> 
							<button type="submit" name="guardar" id="guardar" value="1" class="btn btn-info btn-lg" onclick="armarToken()">
								<?php echo $language['enviar'] ?>
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>