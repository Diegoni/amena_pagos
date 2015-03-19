<?php

/*----------------------------------------------------------------------------
		Validación de datos
----------------------------------------------------------------------------*/

function validation_form($dato, $validacion)
{
	$dato = str_replace("'", '', $dato);
	
	foreach ($validacion as $value)
	{
		$value_case = condicion($value);
		
		switch ($value_case) {
			case 'required':
				if(!(isset($dato) || $dato=='' || $dato==NULL))
				{
					$bandera[] = 'required';
				}
				break;
				
			case 'number':
				if(!(is_numeric($dato)))
				{
					var_dump(is_numeric($dato));
					$bandera[] = 'float';
				}
				break;
				
			case 'min_length':
				$cantidad = str_replace("min_length[", '', $value);
				$cantidad = str_replace("]", '', $cantidad);
				if(strlen($dato) < $cantidad)
				{
					$bandera[] = 'min_length';
				}
				break;
				
			case 'max_length':
				$cantidad = str_replace("max_length[", '', $value);
				$cantidad = str_replace("]", '', $cantidad);
				if(strlen($dato) > $cantidad)
				{
					$bandera[] = 'min_length';
				}
				break;
				
			case 'length':
				$cantidad = str_replace("length[", '', $value);
				$cantidad = str_replace("]", '', $cantidad);
				if(strlen($dato) != $cantidad)
				{
					$bandera[] = 'length';
				}
				break;
				
			case 'date':
				$fecha = str_replace("date[", '', $value);
				$fecha = str_replace("]", '', $fecha);
				if(!(validateDate($dato, $fecha)))
				{
					$bandera[] = 'date';	
				}
				break;								
		}
	}

	if(isset($bandera))
	{
		return $bandera;
	}	
	else
	{
		return TRUE;	
	}
}

/*----------------------------------------------------------------------------
		Devuelve una condición para el switch de la funcion validation_form
----------------------------------------------------------------------------*/

function condicion($value)
{
	if(!(strpos($value, 'min_length') === FALSE))
	{
		return 'min_length';	
	}
	else
	if(!(strpos($value, 'max_length') === FALSE))
	{
		return 'max_length';
	}
	else
	if(!(strpos($value, 'length') === FALSE))
	{
		return 'length';
	}
	else
	if(!(strpos($value, 'date') === FALSE))
	{
		return 'date';
	}
	else
	if($value=='number' || $value=='text' || $value=='required')
	{
		return $value;
	}
}

/*----------------------------------------------------------------------------
		Para validar fecha
----------------------------------------------------------------------------*/

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

/*----------------------------------------------------------------------------
		Para validar float
----------------------------------------------------------------------------*/


function isTrueFloat($val) 
{ 
    $pattern = '/^[+-]?(\d*\.\d+([eE]?[+-]?\d+)?|\d+[eE][+-]?\d+)$/'; 

    return (!is_bool($val) && (is_float($val) || preg_match($pattern, trim($val)))); 
} 



/*----------------------------------------------------------------------------
		Para validar float
----------------------------------------------------------------------------*/


function transformar_importe($importe) 
{ 
    $importe = str_replace(".", '', $importe);
	$importe = str_replace(",", '.', $importe);
	$importe = floatval($importe);

    return $importe; 
}


