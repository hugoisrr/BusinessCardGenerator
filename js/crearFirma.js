// JavaScript document
// Función Ajax para crear firmas electrónicas de Altex
$(document).ready(function() {
	$("form#firmaFormulario").submit(function(e){
		var nombre1 = ($("input#nombre1").val()).trim();
		var nombre2 = ($("input#nombre2").val()).trim();
		var apellidoP = ($("input#apellidoP").val()).trim();
		var apellidoM = ($("input#apellidoM").val()).trim();
		var area = ($("select#area").val()).trim();
		var correo = ($("input#correo").val().toLowerCase()).trim();
		var ext = ($("input#extension").val().trim());
		var otroNumero = ($("input#otroTelefono").val());
		if (otroNumero != "") {
			console.log('Otro número: '+otroNumero);
		}
		var correoAltex = correo + "@grupoaltex.com";
		var apellidos = apellidoP + " " + apellidoM;
		if (nombre2 == null ) {
			var nombre = capitalise(nombre1);
			var nombreCompleto = nombre.trim() + apellidos.trim();
		}else{
			var nombre = capitalise(nombre1) + " " + nombre2;
			var nombreCompleto = nombre.trim() + " " + apellidos.trim();
		}	
		if (area == 'otro') {
			area = ($("input#areaOtro").val()).trim();
		}	
		console.log('Nombre: '+nombre);
		console.log('Apellidos: '+apellidos);
		console.log('Nombre Completo: '+nombreCompleto);
		console.log('Area: '+area);
		console.log('Correo Altex: '+correoAltex);
		var lugar = ($("select#lugar").val());
		// Diserción entre Planta y Corporativo
		if (lugar == '1') {
			var planta = ($("select#planta").val());
			// Switch para generar firma a partir de la planta
			switch(planta){
				case '1':
					// Planta Citrex
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=citrex&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Citrex');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Citrex');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '2':
					// Planta Frexport Huimanguillo
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=frexportHuimanguillo&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Frexport Huimanguillo');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Frexport Huimanguillo');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '3':
					// Planta Frexport Nayarit
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=frexportNayarit&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Frexport Nayarit');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Frexport Nayarit');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '4':
					// Planta Frexport Zamora
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=frexportZamora&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Frexport Zamora');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Frexport Zamora');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '5':
					// Planta Next
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=next&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Next');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Next');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '6':
					// Planta Rioxal
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=rioxal&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Rioxal');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Rioxal');
							console.log(e.responseText);
						}
					});
					return false;
					break;				
				case '7':
					// Planta Servax Blue
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=servax&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Servax Blue');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Servax Blue');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '8':
					// Planta Xtra Celaya
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=xtraCelaya&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Xtra Celaya');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Xtra Celaya');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '9':
					// Planta Xtra Leon
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=xtraLeon&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Xtra Leon');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Xtra Leon');
							console.log(e.responseText);
						}
					});
					return false;
					break;
			}
		}
		else if (lugar == '2') {
			var corporativo = ($("select#corporativo").val());
			// Switch para generar firma a partir del corporativo
			switch(corporativo){
				case '10':
				// Altex México
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=altexMexico&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Altex Mexico');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Altex Mexico');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '11':
				// Altex El Molino
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=altexMolino&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Altex Molino');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Altex Molino');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '12':
				// Altex USA
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=altexUSA&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Altex USA');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Altex USA');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '13':
				// Altex Europa
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=altexEuropa&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Altex Europa');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Altex Europa');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '14':
				// Altex Asia
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=altexAsia&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Altex Asia');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Altex Asia');
							console.log(e.responseText);
						}
					});
					return false;
					break;
				case '15':
				// Permafrost
					$.ajax({
						type: "POST",
						url: "processFirma.php",
						data: 'planta=permafrost&area='+area+'&nombreCompleto='+nombreCompleto+'&correo='+correoAltex+'&nombre='+nombre1+'&extension='+ext+'&otroNumero='+otroNumero,
						dataType: 'html',
						success: function(firma){
							console.log('Firma Permafrost');
							console.log(firma);
							$('#modalFirmaAltex #imagenFirma').html(firma);
							$('#modalFirmaAltex').modal('show');
						},
						error: function(e){
							console.log('Error en firma Permafrost');
							console.log(e.responseText);
						}
					});
					return false;
					break;
			}
		}
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
});