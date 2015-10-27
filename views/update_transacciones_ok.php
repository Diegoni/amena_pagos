<?php
include_once('../config/includes.php');
include_once($route['models'].'m_transaccion.php');
$transaccion = new m_transaccion();

if(isset($_POST['confirmar'])){
	if($_POST['accion'] == 'eliminar'){
		foreach ($_POST['transaccion'] as $row) {
			$transaccion->delete($row);
		}
	}else if($_POST['accion'] == 'conciliar'){
		foreach ($_POST['transaccion'] as $row) {
			$transaccion->conciliar($row);
		}
	}
}

header("Location: transacciones.php");
?>
