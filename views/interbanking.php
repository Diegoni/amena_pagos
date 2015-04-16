<?php
include_once('menu.php'); 
include_once($route['models'].'m_config.php');

$config						= new m_config();
$variable					= $config->get_registros();

foreach ($variable as $row)
{
	$valores = $row;
}

echo "<iframe src=".decrypt($valores['url_interbanking'])." style='width: 100%; height: 100%;'></iframe>" 
?>

