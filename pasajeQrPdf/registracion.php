<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >

<html xmlns="http://www.w3.org/1999/xhtml">



	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> Aerolineas</title>
		<link rel="StyleSheet" href="estilo.css" type="text/css"/>
		<script src='codigo.js' type='text/javascript'></script>


	<body>
		
		<?php
		
		$ciudadOrigen = $_POST['ciudadOrigen'];
		echo "<br>Ciudad de origen: $ciudadOrigen <br>";
		
		$ciudadDestino = $_POST['ciudadDestino'];
		echo "<br>Ciudad de destino: $ciudadDestino <br>";
		
		$categoria = $_POST['categoria'];
		echo "<br>Categoria: $categoria <br>";
		
	//set it to writable location, a place for temp generated PNG files
	$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

	//html PNG location prefix
	$PNG_WEB_DIR = 'temp/';

	include "archivosQR/qrlib.php";    
	
	//ofcourse we need rights to create temp dir
	if (!file_exists($PNG_TEMP_DIR))
		mkdir($PNG_TEMP_DIR);

	$filename = $PNG_TEMP_DIR.'test.png';

	$matrixPointSize = 10;
	$errorCorrectionLevel = 'L';

	$filename = $PNG_TEMP_DIR.'test'.md5(/*$_REQUEST[''].*/'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
	QRcode::png($ciudadOrigen.$ciudadDestino.$categoria, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 

	echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  


			echo"<form id='botonImprimir' action='archivopdf.php' method='post' name='impresion'>";
				
				
				echo"<div id='boton'>";
				echo "<input type='hidden' name='ciudadOrigen' value='$ciudadOrigen'><br>";
				echo "<input type='hidden' name='ciudadDestino' value='$ciudadDestino'><br>";
				echo "<input type='hidden' name='categoria' value='$categoria'><br>";
				?>	
					<input type="submit" value="Imprimir pasaje en pdf" name="Boton"/>
					
					
				</div>
			
			</form>

	
	</body>
	
</head>