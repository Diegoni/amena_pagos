/*----------------------------------------------------------------------------
		Para tablas
----------------------------------------------------------------------------*/


$(document).ready(function() {
	$('#datatable').DataTable({
		responsive: true,
		"language": {
            "lengthMenu": "Mostrar _MENU_ registros por pag.",
            "zeroRecords": "Sin registros",
            "info": "Mostrando pag. _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "search": "Buscar",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
	});
} );


/*----------------------------------------------------------------------------
		Mostrar tabla
----------------------------------------------------------------------------*/


$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop() > 50) {
			$('.totales').show("drop", 1000);
		} else {
			$('.totales').hide("drop", 1000);
		}
	});
});


/*----------------------------------------------------------------------------
		Ir arriba
----------------------------------------------------------------------------*/


$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
  
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});  
});


/*----------------------------------------------------------------------------
		Validar formulario
----------------------------------------------------------------------------*/


function validar_config()
{	
	if
	(
		validar_campo('id_comunidad', 'numero', 25) == 0 ||
		validar_campo('url_reporte', 'url') == 0 ||
		validar_campo('url_post', 'url') == 0 ||
		validar_campo('url_estado_transferencia', 'url') == 0 ||
		validar_campo('Nombre_usuario', 'alfanumerico', 12) == 0 ||
		validar_campo('Clave', 'alfanumerico', 12) == 0 ||
		validar_campo('cuil', 'numero', 20) == 0 
	)
	{
		return false;
	}
	else
	{
		return true;
	}
}


/*----------------------------------------------------------------------------
		Validar formulario
----------------------------------------------------------------------------*/


function validar_estados()
{	
	if
	(/*
		validar_campo('ClienteCuit', 'numero', 25) == 0 ||
		validar_campo('VendedorCuit', 'numero', 11) == 0 ||
		validar_campo('ImporteDesde', 'alfanumerico', 12) == 0 ||
		validar_campo('ImporteHasta', 'alfanumerico', 12) == 0 ||
		validar_campo('FechaDesde', 'alfanumerico', 12) == 0 ||
		validar_campo('FechaHasta', 'alfanumerico', 12) == 0 ||
		validar_campo('OperacionDesde', 'alfanumerico', 10) == 0 ||
		validar_campo('OperacionHasta', 'alfanumerico', 12) == 0 ||
		validar_campo('Estado', 'alfanumerico', 12) == 0  
	*/
	false//ver
	)
	{
		return false;
	}
	else
	{
		return true;
	}
}

/*----------------------------------------------------------------------------
		Validar formulario
----------------------------------------------------------------------------*/


function validar_preconfeccion()
{	
	if
	(
		validar_campo('ClienteCuit', 'numero', 11) == 0 ||
		validar_campo('ComprobanteNN', 'alfanumerico', 12) == 0 ||
		validar_campo('ImporteNN', 'numero') == 0 	 
	)
	{
		return false;
	}
	else
	{
		return true;
	}
}


/*----------------------------------------------------------------------------
		Validaciones
----------------------------------------------------------------------------*/


function validar_campo(id, validacion, length)
{
	var expre_url	= /^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i;
	var no_url		= "No es url";
	
	var expre_alfanumerico	= /^[a-z0-9\sáéíóúñ.,_\-\&\/]+$/i;
	var no_alfanumerico		= "No es alfanumerico";
	
	var expre_numero		= /^([0-9])*$/;
	var no_numero			= "No es un número";
	
	var no_length			= "Supera el máximo de caracteres permitido, máximo :"+length;
	
	if(length != undefined)
	{
		valor = $('#'+id).val();

		if(valor.length > length)
		{
			alert(no_length);
			$('#'+id).focus();
			return 0;
		}
	}
		
	if(validacion == 'url')
	{
		if(!(expre_url.test($('#'+id).val())))
		{
			alert(no_url);
			$('#'+id).focus();
			return 0;
		}
	}
	else
	if(validacion == 'alfanumerico')
	{
		if(!(expre_alfanumerico.test($('#'+id).val())))
		{
			alert(no_alfanumerico);
			$('#'+id).focus();
			return 0;
		}		
	}
	else
	if(validacion == 'numero')
	{
		if(!(expre_numero.test($('#'+id).val())))
		{
			alert(no_numero);
			$('#'+id).focus();
			return 0;
		}	
	}
	else
	{
		return 1;
	}
} 


/*----------------------------------------------------------------------------
		Armar Token para transacción 
----------------------------------------------------------------------------*/


function armarToken()
{
	cuit		= $("#cuit").val();
	importe		= $("#importe").val();
	importe		= importe.replace('.','');
	importe		= importe.replace(',','');
	periodo		= $("#periodo").val();
	periodo		= periodo.replace('/','');
	fechapago	= $("#fechapago").val();
	fechapago	= fechapago.replace('/','');
	fechapago	= fechapago.replace('/','');
	comprob		= $("#comprob").val();
	token		= comprob+fechapago+periodo+importe+cuit;
	token		= token.replace(' ', '');
	$("#token").val(comprob+fechapago+periodo+importe+cuit);
}


/*----------------------------------------------------------------------------
		Mostrar ocultar div 
----------------------------------------------------------------------------*/


$(document).ready(function(){
	$(".slidingDiv").hide();
	$(".show_hide").show();
 
    $('.show_hide').click(function(){
    	$(".slidingDiv").slideToggle();
    });
});



/*----------------------------------------------------------------------------
		Button delete
----------------------------------------------------------------------------*/


$(document).ready(function(){
	$('.delete').click(function(){
    	confirm('Esta seguro que desea borrar el registro');
    });
});


/*----------------------------------------------------------------------------
		Button delete
----------------------------------------------------------------------------*/


function solo_numeros(event)
{
	var keycode;
	if (window.event)
	{
		keycode = window.event.keyCode;	
	}
	else if (event)
	{
		keycode = event.keyCode;
	}
	else if (e) 
	{
		keycode = e.which;
	}
	else 
	{
		return true;	
	}
	
	    
	if ((keycode > 47 && keycode <= 57) || keycode == 44)
	{
		return true;
	}
	else
	{
		return false;
    }
    
	return true;
}
