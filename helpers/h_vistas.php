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
	return '<li><a href="'.$link.'">'.$cadena.'</a></li>'. "\n";
}

function get_panel_heading()
{
	$url	= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$title	= str_replace(BASE_URL.'views/', '', $url);
	$title	= str_replace('.php', '', $title);
	$title	= str_replace('_', ' ', $title);
	$title	= str_replace('-', ' ', $title);
	$title	= strtok($title, "?");
	
	return ucwords($title);
}

function set_alert($mensaje, $type = NULL)
{
	if($type ==  NULL)
	{
		$type = 'success';
	}
	else
	if(	$type != 'success' && 
		$type != 'info' && 
		$type != 'warning' && 
		$type != 'default' && 
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

function set_format($dato, $format)
{
	switch ($format) {
			case 'cuit':
				if(strlen($dato) == 11)
				{
					$cadena = substr($dato, 0, 2);
					$cadena .= '-';
					$cadena .= substr($dato, 2, 8);
					$cadena .= '-';
					$cadena .= substr($dato, 10);
										
					return $cadena;
				}
				break;
			
			case 'importe':
				$cadena = "$ ".round($dato, 2);
				return $cadena;
				
				break;
			
			case 'date':
				$cadena = date('d-m-Y',strtotime( $dato));
				return $cadena;
				
				break;
				
			case 'datetime':
				$cadena = date('d-m-Y H:i:s',strtotime( $dato));
				return $cadena;
				
				break;

	}
}

function cambioCadena($cadena, $language)
{
	switch ($cadena) {
		case 'clientecuit':
		return $language['cliente']." ".$language['cuil'];
		break;
		
		case 'numerooperacion':
		return $language['numero']." ".$language['operacion'];
		break;
		
		case 'numerooperacionib':
		return $language['numero']." ".$language['operacion']." ".$language['interbanking'];
		break;
	
		case 'numerointerno':
		return $language['numero']." ".$language['interno'];
		break;
	
		case 'numerocuentarecaudacion':
		return $language['numero']." ".$language['cuenta']." ".$language['recaudacion'];
		break;
	
		case 'fechapago':
		return $language['fecha']." ".$language['pago'];
		break;
		
		case 'importe':
		return $language['importe'];
		break;
	
		case 'estado':
		return $language['estado'];
		break;
		
		case 'motivorechazo':
		return $language['motivo']." ".$language['rechazo'];
		break;
		
		case 'observaciones':
		return $language['observaciones'];
		break;
	}
}



function getProfile($datos)
{
	return '<div class="profile-sidebar">
				
				<div class="profile-userpic">
					<img src="../doc/user.png" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						'.$datos['alias'].'
					</div>
					<div class="profile-usertitle-job">
						'.$datos['apellido'].' '.$datos['nombre'].'
					</div>
				</div>
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a>
							<i class="fa fa-phone"></i>
							'.$datos['telefono'].'
							</a> 
						</li>
						<li>
							<a>
							<i class="fa fa-envelope-o"></i>
							'.$datos['email'].'
							</a> 
						</li>
						<li>
							<a>
							<i class="fa fa-compass"></i>
							'.$datos['direccion'].'
							</a> 
						</li>
					</ul>
				</div>
			</div>';
}
