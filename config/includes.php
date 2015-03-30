<title></title>
<!--BEGIN META TAGS-->
<META NAME="keywords" CONTENT="">
<META NAME="description" CONTENT="Interbanking">
<META NAME="rating" CONTENT="General">
<META NAME="ROBOTS" CONTENT="ALL">
<!--END META TAGS-->

<!-- Charset tiene que estar en utf-8 para que tome ñ y acentos -->
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


<!-- Iconos -->
<link type="image/x-icon" href="imagenes/favicon.ico" rel="icon" />
<link type="image/x-icon" href="imagenes/favicon.ico" rel="shortcut icon" />
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

//echo js_libreria($route['libraries'].'bootstrap_3.3.4/js/bootstrap.js');
//echo css_libreria($route['libraries'].'bootstrap_3.3.4/css/bootstrap.css');

echo js_libreria($route['libraries'].'eden-ui/js/bootstrap.js');
echo css_libreria($route['libraries'].'eden-ui/css/bootstrap.css');
echo css_libreria($route['libraries'].'eden-ui/skins/eden.css');

echo js_libreria($route['libraries'].'main/js/main.js');
echo css_libreria($route['libraries'].'main/css/main.css');


echo js_libreria($route['libraries'].'DataTables-1.10.5/media/js/jquery.dataTables.js');
echo css_libreria($route['libraries'].'DataTables-1.10.5/media/css/jquery.dataTables.css');

echo css_libreria($route['libraries'].'font-awesome-4.3.0/css/font-awesome.css');
