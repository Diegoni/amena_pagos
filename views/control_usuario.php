<?php
session_start();
//control de acceso, si no hay session
if(!isset($_SESSION['nombre']))
{
	header("Location: acceso.php");
}
else
{
	
}
