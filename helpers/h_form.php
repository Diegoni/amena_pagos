<?php

/*----------------------------------------------------------------------------
		Validación de datos
----------------------------------------------------------------------------*/

function validation_form($dato, $validacion)
{
	foreach ($validacion as $value)
	{
		$value_case = condicion($value);
		
		switch ($value_case) {
			case 'int':
				if(!(is_numeric($dato)))
				{
					$bandera[] = 'int';
				}
				break;
				
			case 'text':
				
				break;
			case 'required':
				if(!(isset($dato) || $dato=='' || $dato==NULL))
				{
					$bandera[] = 'required';
				}
				break;
				
			case 'float':
				$dato = str_replace(".", '', $dato);
				$dato = str_replace(",", '.', $dato);
				echo $dato.'<br>';
				if(!(is_float($dato)))
				{
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
	if($value=='int' || $value=='float' || $value=='text' || $value=='required')
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


