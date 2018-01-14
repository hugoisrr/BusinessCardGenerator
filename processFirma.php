<?php
	include "functions.php";
	// Se obtiene los datos del documentos AJAX
	$planta = $_POST['planta'];
	$area = $_POST['area'];
	$nombreCompleto = $_POST['nombreCompleto']; 
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$ext = $_POST['extension'];
	$otroNumero = $_POST['otroNumero'];
	// Se crea una imagen y se determina el tamaño de la imagen
	$firmaAltex = imagecreatetruecolor( 578, 196 );
	// FUENTES
	$fontFutura = 'fonts/FuturaStd-Book.ttf';
	$fontFuturaBold = 'fonts/futura_std_bold.ttf';
	// COLORES
	$colorRojo = imagecolorallocate($firmaAltex, 134, 31, 65);
	$colorGris = imagecolorallocate($firmaAltex, 91, 103, 112);	
	$colorBlanco = imagecolorallocate($firmaAltex, 255, 255, 255);
	$colorNegro = imagecolorallocate($firmaAltex, 0, 0, 0);
	// COLORES CITREX
	$colorNaranja = imagecolorallocate($firmaAltex, 210, 168, 9);
	$colorNaranjaClaro = imagecolorallocate($firmaAltex, 255, 203, 4);
	$colorRojoFuerte = imagecolorallocate($firmaAltex, 221, 88, 39);
	$colorRojoCitrex = imagecolorallocate($firmaAltex, 243, 111, 33);
	// COLORES FREXPORT
	$colorPurpura = imagecolorallocate($firmaAltex, 0, 73, 128);
	$colorAzul = imagecolorallocate($firmaAltex, 0, 133, 187);
	$colorRojoFrexport = imagecolorallocate($firmaAltex, 25, 122, 48);
	$colorVerde = imagecolorallocate($firmaAltex, 56, 180, 73);
	// COLORES NEXT
	$colorAzulNext = imagecolorallocate($firmaAltex, 55, 160, 210);
	$colorAzulClaro = imagecolorallocate($firmaAltex, 80, 195, 240);
	$colorRojoNext = imagecolorallocate($firmaAltex, 25, 120, 50);
	$colorVerdeNext = imagecolorallocate($firmaAltex, 60, 180, 75);
	// COLORES SERVAX BLEU
	$colorMorado = imagecolorallocate($firmaAltex, 0, 75, 130);
	$colorAzulServax = imagecolorallocate($firmaAltex, 0, 115, 190);
	$colorRojoServax = imagecolorallocate($firmaAltex, 180, 60, 65);
	$colorRosa = imagecolorallocate($firmaAltex, 230, 130, 130);
	// COLORES XTRA
	$color1xtra = imagecolorallocate($firmaAltex, 55, 160, 210);
	$color2xtra = imagecolorallocate($firmaAltex, 80, 195, 240);
	$color3xtra = imagecolorallocate($firmaAltex, 0, 75, 125);
	$color4xtra = imagecolorallocate($firmaAltex, 0, 115, 190);
	// COLORES RIOXAL
	$color1rioxal = imagecolorallocate($firmaAltex, 205, 165, 125);
	$color2rioxal = imagecolorallocate($firmaAltex, 240, 205, 175);
	$color3rioxal = imagecolorallocate($firmaAltex, 125, 70, 35);
	$color4rioxal = imagecolorallocate($firmaAltex, 160, 90, 50);

	// Se determina el background de la imagen
	imagefill($firmaAltex, 0, 0, $colorBlanco);		

	// Creamos la firma de Altex Citrex
	if ($planta == 'citrex') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/citrex_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_CITREX.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojoFuerte, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojoFuerte, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (232) 324 9500');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Carretera a Cañadas libramiento y carret.');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Martinez S/N Col. Los Puentes Martinez de la Torre, Veracruz, C.P. 93600');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 98);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Frexport Huimanguillo
	if ($planta == 'frexportHuimanguillo') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/frexport_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_FREXPORT.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojoFrexport, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojoFrexport, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (917) 375 1053');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Av. de la Juventud s/n ');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Esquina carretera San Manuel. Huimanguillo, Tabasco, C.P. 86400');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Frexport Nayarit
	if ($planta == 'frexportNayarit') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/frexport_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_FREXPORT.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojoFrexport, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojoFrexport, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (323) 234 7035');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.5, 0, 178, 106, $colorGris, $fontFutura, 'Kilómetro 5. Carretera Valle Lerma. ');
		imagettftext($firmaAltex, 8.5, 0, 178, 120, $colorGris, $fontFutura, 'Estación Nanchi, Nayarit, C.P. 63569');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Frexport Zamora
	if ($planta == 'frexportZamora') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/frexport_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_FREXPORT.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojoFrexport, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojoFrexport, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (351) 530 9500');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.5, 0, 178, 106, $colorGris, $fontFutura, 'Labastida 912 Col. Juárez, ');
		imagettftext($firmaAltex, 8.5, 0, 178, 120, $colorGris, $fontFutura, 'Zamora, Michoacán, C.P. 59620');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}	

	// Creamos la firma de Altex Next
	if ($planta == 'next') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/next_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_NEXT.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojoNext, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojoNext, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (476) 744 7910');
		imagettftext($firmaAltex, 10, 0, 326, 89, $colorGris, $fontFutura, $ext);
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Carretera León Cuerámaro Km 13.');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Rancho San Cristóbal. San Francisco del Rincón, Guanajuato, C.P. 36440');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Rioxal
	if ($planta == 'rioxal') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/rioxal_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_RIOXAL.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $color3rioxal, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $color3rioxal, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (282) 825 7010');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Carretera Federal Xalapa – Perote, Km 118,');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Col. La Cima, Las Vigas de Ramirez, Veracruz, C.P. 91330');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Servax Blue
	if ($planta == 'servax') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/servax_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_SERVAX.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojoServax, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojoServax, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (646) 175 0630');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Calzada Emiliano Zapata M I 51, Lote 151');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'El Sauzal de Rodríguez Ensenada, Baja California, C.P. 22760');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Xtra Celaya
	if ($planta == 'xtraCelaya') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/xtra_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_XTRA.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $color3xtra, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $color3xtra, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (412) 157 4400');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Carretera Celaya-Juventino Rosas');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'KM 17.5, sin colonia, Juventino Rosas, Guanajuato, C.P. 38240');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex Xtra Leon
	if ($planta == 'xtraLeon') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/xtra_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_XTRA.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $color3xtra, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $color3xtra, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (476) 744 7000');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Carretera León – Cuerámaro');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Km. 12.5 Rancho San Cristóbal San Francisco del Rincón, Gto. C.P. 36440');
		// Mensaje de Footer
		include "disclaimer.php";
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}	

	// Creamos la firma de Altex Corporativo México
	if ($planta == 'altexMexico') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/AJA.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_1.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojo, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojo, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (55) 5284 0360');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Paseo de las Palmas 820 1er piso,');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Col. Lomas de Chapultepec, Ciudad de México, México, C.P. 11000');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex El Molino / CIID
	if ($planta == 'altexMolino') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/AJA.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_1.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojo, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojo, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+52 (55) 5354 9190');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.4, 0, 178, 106, $colorGris, $fontFutura, 'Cuauhtémoc #15, Col. Azcapotzalco.');
		imagettftext($firmaAltex, 8.4, 0, 178, 120, $colorGris, $fontFutura, 'Del. Azcapotzalco; Ciudad de México, México, C.P. 02000');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de Altex USA
	if ($planta == 'altexUSA') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/ALTEX_FOODANDGOOD.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_1.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojo, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojo, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+1(305) 459 0060');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Altex USA');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, '3225 Aviation Ave, Suite 600 Coconut Grove, FL 33133');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}

	// Creamos la firma de  Altex Asia
	if ($planta == 'altexAsia') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/ALTEX_FOODANDGOOD.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_1.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojo, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojo, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+81 (364) 471 285');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Altex Asia');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, '8F Mikuni Roppongi Building, 7-8-8 Roppongi, Minato-ku, Tokyo 106-0032');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}	
	// Creamos la firma de Altex Europa
	if ($planta == 'altexEuropa') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/ALTEX_FOODANDGOOD.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_1.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojo, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojo, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '+34 (93) 481 7737');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Altex Europe Drac Grup Europe S.L.');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Paseo de Gracia, 21, 5°, 1ª, 08007, Barcelona, España');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}
	// Creamos la firma Permafrost
	if ($planta == 'permafrost') {
		// Elementos que se agregan a la imagen: logo y pleca
		$logoAltex = imagecreatefrompng('img/LOGOS/PERMAFROST_logo_firma.png');
		$plecaAltex = imagecreatefromjpeg('img/PLECAS/PLECA_PERMAFROST.jpg');
		// Se agrega el texto en la imagen
		imagettftext($firmaAltex, 13, 0, 178, 28, $colorRojo, $fontFutura, $nombreCompleto);
		imagettftext($firmaAltex, 11, 0, 178, 49, $colorGris, $fontFutura, $area);
		imagettftext($firmaAltex, 9, 0, 178, 71, $colorRojo, $fontFutura, $correo);
		imagettftext($firmaAltex, 10, 0, 178, 89, $colorGris, $fontFutura, '(01476) 744 7910');
		if (($ext != '') && ($otroNumero != '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext.' / '.$otroNumero);
		}elseif (($ext != '') && ($otroNumero == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, 'ext. '.$ext);
		}elseif (($otroNumero != '') && ($ext == '')) {
			imagettftext($firmaAltex, 10, 0, 305, 89, $colorGris, $fontFutura, ' / '.$otroNumero);
		}
		imagettftext($firmaAltex, 8.3, 0, 178, 106, $colorGris, $fontFutura, 'Permafrost Transportes');
		imagettftext($firmaAltex, 8.3, 0, 178, 120, $colorGris, $fontFutura, 'Carr. León-Cueramaro Km.13 San Cristobal, San Fco. del Rincón, GTO.');
		// Mensaje de Footer
		include "disclaimer.php";
		// Se copian los elementos para generar una sola imagen
		imagecopy($firmaAltex, $logoAltex, 0, 18, 0, 0, 162, 108);
		imagecopy($firmaAltex, $plecaAltex, 0, 128, 0, 0, 578, 6);
		// regresa la firma final de Altex	
		$nombreArchivo = "img/FIRMAS/".$nombre."_".$area."_".$planta.".jpg";
		// remueve caracteres latinos
		$nombreArchivo = removeAccents($nombreArchivo);
		// crea la firma con 90% de calidad en jpeg
		imagejpeg($firmaAltex,$nombreArchivo, 90);
		// guarda la imagen en el servidor
		echo "<a href='".$nombreArchivo."' download><img src='".$nombreArchivo."' class='img-responsive'/></a>";
		imagedestroy($logoAltex);
		imagedestroy($plecaAltex);
		imagedestroy($firmaAltex);
	}	
?>