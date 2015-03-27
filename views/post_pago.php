<?php
include_once('../config/includes.php');
?>
<script>
	$(document).ready(function(){
		$('#guardar').click();	
		window.close();
	});
</script>
<form method="post" action="https://presib.interbanking.com.ar/loginConfeccionB2B.do">
	<input type='hidden' name="CodigoComunidad" value="30645385329">
	<input type='hidden' name="CantidadTransacciones" value="1">
	<input type='hidden' name="WindowPopUp" value="True">
	<input type='hidden' name="Comprobante1" value="1">
	<input type='hidden' name="FechaPago1" value="<?php echo date('d/m/Y')?>">
	<input type='hidden' name="Importe1" value="1000.00">
	<input type="submit" name="guardar" id="guardar" value="<?php echo $id_config?>">
</form>

<?php
include_once('footer.php');
?>