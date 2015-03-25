<?php  

/*---------------------------------------------------------------------
		Configuraciones generales
---------------------------------------------------------------------*/

include_once('config.php');
include_once('constants.php');
include_once('database.php');
include_once('routes.php');

/*---------------------------------------------------------------------
		Helpers, modelos y vistas
---------------------------------------------------------------------*/


include_once($route['models'].'My_model.php');
include_once($route['helpers'].'h_vistas.php');
include_once($route['helpers'].'h_language.php');

include_once($route['models'].'My_Model.php');

/*---------------------------------------------------------------------
		Librerias
---------------------------------------------------------------------*/


echo js_libreria($route['libraries'].'jquery/jquery-1.11.2.min.js');

echo js_libreria($route['libraries'].'bootstrap_3.3.4/js/bootstrap.js');
echo css_libreria($route['libraries'].'bootstrap_3.3.4/css/bootstrap.css');

echo js_libreria($route['libraries'].'main/js/main.js');
echo css_libreria($route['libraries'].'main/css/main.css');

