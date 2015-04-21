<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);	

$pkcs12 		= file_get_contents("../doc/openssl/amena.openssl");
$private_key = $pkcs12;

$codigoComunidad = "30645385329";
$cantidadTransacciones = "1";
$windowPopUp = "1";
$outUrl = "";
$FechaPagoX = "20/04/2015"; 
$ComprobanteX = "000421";
$ImporteX = "3650.4";
$CuentaRecaudacionIdX = "0440102400400012005741";
$ObservacionX = "";

$data = $codigoComunidad.$cantidadTransacciones.$windowPopUp.$outUrl.$FechaPagoX.$ComprobanteX.$ImporteX.$CuentaRecaudacionIdX.$ObservacionX;

openssl_sign($data, $signature, $private_key);

$signature_64 = base64_encode($signature);

?>
<table>
<form method="post" target="_blank" action="https://presib.interbanking.com.ar/loginConfeccionB2B.do"></form>

		signature
		<input type="text" name="signature" value="sXz+eHSqJEChFpvQyD5PDsFtb13fhDqXaiPDT45LXz9ooCqdEnLOdbgVAa6aQxukeDtOxkPMrh02z4Hm/3oZNkO2JH2r0tPoA2uUKTMTBZ6GkMYgp2a/yf7fY0XLeh/xh6K+qy5GxI1uMd1O68h+poB2L3mgVNGBAhd1rJKvJLU=">
	
	
		CodigoComunidad
		 <input type="text" name="CodigoComunidad" value="30645385329">
	
	
		CantidadTransacciones
		 <input type="text" name="CantidadTransacciones" value="1">
	
	
		WindowPopUp
		 <input type="text" name="WindowPopUp" value="1">
	
	
		OutUrl
		 <input type="text" name="OutUrl" value="">
	
	
		FechaPago1
		<input type="text" name="FechaPago1" value="20/04/2015">
	
	
		Comprobante1
		<input type="text" name="Comprobante1" value="000421">
	
	
		Importe1
		<input type="text" name="Importe1" value="3650.4">
	
	
		CuentaRecaudacionId1
		<input type="text" name="CuentaRecaudacionId1" value="0440102400400012005741">
	
	
		Observacion1
		<input type="text" name="Observacion1" value="">
	
	
		urlErrorSignature
		<input type="text" name="urlErrorSignature" value="">
	
	
		AtraparErrores
		<input type="text" name="AtraparErrores" value="">
	
	
		actionUrl
		<input type="text" name="actionUrl" value="30645385329">
	
	
		
		<input type="submit" name="guardar" id="guardar" value="enviar">
	

</form>
</table>