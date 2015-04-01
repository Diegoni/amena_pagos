/*----------------------------------------------------------------------------
		Para tablas
----------------------------------------------------------------------------*/


$(document).ready(function() {
	$('#datatable').DataTable({
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