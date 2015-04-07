<?php  

/*---------------------------------------------------------------------
		Configuraciones generales
---------------------------------------------------------------------*/

include_once('configs.php');
include_once('constants.php');
include_once('database.php');
include_once('routes.php');


/*---------------------------------------------------------------------
		Helpers, modelos y vistas
---------------------------------------------------------------------*/

include_once($route['models'].'My_model.php');
include_once($route['helpers'].'h_vistas.php');
include_once($route['helpers'].'h_language.php');
include_once($route['helpers'].'h_form.php');

//include_once($route['models'].'My_Model.php');

/*---------------------------------------------------------------------
		Librerias
---------------------------------------------------------------------*/

echo js_libreria($route['libraries'].'jquery/jquery-1.11.2.min.js');

echo js_libreria($route['libraries'].'eden-ui/js/bootstrap.js');
echo css_libreria($route['libraries'].'eden-ui/css/bootstrap.css');
echo css_libreria($route['libraries'].'eden-ui/skins/eden.css');

echo js_libreria($route['libraries'].'main/js/main.js');
echo css_libreria($route['libraries'].'main/css/main.css');


echo js_libreria($route['libraries'].'DataTables-1.10.5/media/js/jquery.dataTables.js');
echo css_libreria($route['libraries'].'DataTables-1.10.5/media/css/jquery.dataTables.css');

echo css_libreria($route['libraries'].'font-awesome-4.3.0/css/font-awesome.css');
