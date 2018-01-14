// Funcion que capitaliza la primer letra de una palabra
function capitalise(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}
/*
capitalise("alfredo")  // => "Alfredo"
capitalise("Alejandro")// => "Alejandro 
capitalise("ALBERTO")  // => "Alberto"
capitalise("ArMaNdO")  // => "Armando" */
// Función para validar si el string es un email o no
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
// Función para mostrar el input field a partir de la selección de área 
$('select#area').on('change', function(){
	if ($(this).val() === "otro") {
		$("#otroInput").show()
	}else(
		$("#otroInput").hide()
	)
});
// Función para mostrar y/o ocultar input field para agregar número teléfonico
$('button#agregarNumero').on('click', function(){
	$("fieldset#otroTelefono").toggle();
});