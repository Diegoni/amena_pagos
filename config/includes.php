<?php  

/*---------------------------------------------------------------------
		Configuraciones generales
---------------------------------------------------------------------*/

include_once('config.php');
include_once('constants.php');
include_once('database.php');
include_once('routes.php');

/*---------------------------------------------------------------------
		Controladores, modelos y vistas
---------------------------------------------------------------------*/

include_once($route['models'].'My_model.php');
//include_once($route['controllers'].'My_controller.php');

/*---------------------------------------------------------------------
		Librerias
---------------------------------------------------------------------*/
