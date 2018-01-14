// JavaScript document
// Función AJAX para mostrar u ocultar select de Plantas ó Corporativo de Altex
$(document).ready(function() {
	$('#planta').hide();
	$('#corporativo').hide();
	$('select#lugar').change(function(){
		if ($('select#lugar').val() == '1') {
			$('#planta').show();
			$('#corporativo').hide();
		}
		else if ($('select#lugar').val() == '2') {
			$('#corporativo').show();
			$('#planta').hide();
		}
		else {
			$('#corporativo').hide();
			$('#planta').hide();
		}
	});
});