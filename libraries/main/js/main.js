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
