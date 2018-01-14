// JavaScript document
// Función Ajax para crear firmas electrónicas de Altex
$(document).ready(function() {
	$("#crearFirma").click(function(){
		var isValid = true;
        $('input[type="text"]').each(function() {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE"
                });
                alert("Campos vacios!");
                return false;
            }
            else {
            	// Obtenemos los valores de los input para crear la firma
				var nombres = ($("input[name='nombres[]']").map(function(){return $(this).val();}).get());
				var apellidos = ($("input[name='apellidos[]']").map(function(){return $(this).val();}).get());
				var area = ($("input#area").val());	
				var planta = ($("select#fabricas").val());
				var email = ($("input#correo").val());
				var arrNombres = nombres[0].split(" ");
				var arrApellidos = apellidos[0].split(" ");
				console.log('Numero de elementos en nombres: '+arrNombres.length);
				console.log('Numero de elementos en apellidos: '+arrApellidos.length);
				console.log('Primer nombre: '+capitalise(arrNombres[0]));
				console.log('Segundo nombre: '+capitalise(arrNombres[1]));
				console.log('Primer apellido: '+capitalise(arrApellidos[0]));
				console.log('Segundo apellido: '+capitalise(arrApellidos[1]));
				console.log('Valor de area: '+capitalise(area));
				// console.log('Planta: '+planta);
				switch(planta){
					case '1':
						// Planta Corporativo
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=corporativo&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido='+capitalise(arrApellidos[0])+'&2doapellido='+capitalise(arrApellidos[1])+'&correo='+email.toLowerCase(),
							dataType: 'html',
							success: function(data){
								console.log('Se crea firma');
								console.log(data);
								$('#modalFirmaAltex #imagenFirma').html(data);
								$('#modalFirmaAltex').modal('show');						
							},
							error: function(e){
								console.log('Hubo un error');
								console.log(e.responseText);
							}
						});
						return false;
						break;
					case '2':
						// Planta Citrex
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=citrex&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido='+capitalise(arrApellidos[0])+'&2doapellido'+capitalise(arrApellidos[1])+'&correo'+email.toLowerCase(),
							dataType: 'json',
							success: function(response){
								console.log(response);
							},
							error: function(e){
								console.log(e.responseText);
							}
						});
						return false;
						break;
					case '3':
						// Planta Next
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=next&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido'+capitalise(arrApellidos[0])+'&2doapellido'+capitalise(arrApellidos[1])+'&correo'+email.toLowerCase(),
							dataType: 'json',
							success: function(response){
								console.log(response);
							},
							error: function(e){
								console.log(e.responseText);
							}
						});
						return false;
						break;
					case '4':
						// Planta Rioxal
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=rioxal&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido'+capitalise(arrApellidos[0])+'&2doapellido'+capitalise(arrApellidos[1])+'&correo'+email.toLowerCase(),
							dataType: 'json',
							success: function(response){
								console.log(response);
							},
							error: function(e){
								console.log(e.responseText);
							}
						});
						return false;
						break;
					case '5':
						// Planta Xtra
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=xtra&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido'+capitalise(arrApellidos[0])+'&2doapellido'+capitalise(arrApellidos[1])+'&correo'+email.toLowerCase(),
							dataType: 'json',
							success: function(response){
								console.log(response);
							},
							error: function(e){
								console.log(e.responseText);
							}
						});
						return false;
						break;
					case '6':
						// Planta Servax Blue
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=servax&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido'+capitalise(arrApellidos[0])+'&2doapellido'+capitalise(arrApellidos[1])+'&correo'+email.toLowerCase(),
							dataType: 'json',
							success: function(response){
								console.log(response);
							},
							error: function(e){
								console.log(e.responseText);
							}
						});
						return false;
						break;
					case '7':
						// Planta Frexport
						$.ajax({
							type: "POST",
							url: "processFirma.php",
							data: 'planta=frexport&area='+capitalise(area)+'&1ernombre='+capitalise(arrNombres[0])+'&2donombre='+capitalise(arrNombres[1])+'&1erapellido'+capitalise(arrApellidos[0])+'&2doapellido'+capitalise(arrApellidos[1])+'&correo'+email.toLowerCase(),
							dataType: 'json',
							success: function(response){
								console.log(response);
							},
							error: function(e){
								console.log(e.responseText);
							}
						});
						return false;
						break;
				}
            }
        });	
        return false;	
	});
});