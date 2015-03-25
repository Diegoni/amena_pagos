<?php
/*----------------------------------------------------------------------------
		Carga de librerias
----------------------------------------------------------------------------*/

function js_libreria($libreria)
{
	return '<script type="text/javascript" src="'.$libreria.'"></script>' . "\n";
}

function js_vista($libreria)
{
	return '<script type="text/javascript" src="'.$libreria.'"></script>' . "\n";
}

function css_libreria($libreria)
{
	return '<link href="'.$libreria.'" rel="stylesheet" type="text/css" />'. "\n";
}

function item_menu($link, $cadena)
{
	return '<li><a href="'.base_url().'index.php/'.$link.'">'.$cadena.'</a></li>'. "\n";
}

function get_panel_heading($REQUEST_URI)
{
	$url	= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$title	= str_replace(BASE_URL.'views/', '', $url);
	$title	= str_replace('.php', '', $title);
	
	return ucwords($title);
}

function set_alert($mensaje, $type = NULL)
{
	if($type ==  NULL)
	{
		$type = 'success';
	}
	else
	if(	$type != 'success' || 
		$type != 'info' || 
		$type != 'warning' || 
		$type != 'danger')
	{
		$type = 'success';
	}
	
	$alert	=  "<div class='alert alert-$type alert-dismissible' role='alert'>";
	$alert	.= "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
	$alert	.= $mensaje;
	$alert	.= "</div>";
	
	return $alert; 
}



