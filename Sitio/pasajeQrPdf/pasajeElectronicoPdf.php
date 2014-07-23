<html>
	<head>
		<title>Aerolíneas Del Plata</title>
	</head>
	
	<body>
		<?php
			require('fpdf17/fpdf.php'); //utiliza la clase fpdf
		 
			//header('Content-Type: text/html;charset=iso-8859-1');//soluciona visualizacion de tildes
			header('Content-Type: text/html;charset=utf-8');
		 
			class PDF extends FPDF { // PDF hereda de FPDF, utiliza sus funciones
		 
			}
			
			$corigen = strtoupper($_POST['corigen']);//strtoupper convierte a mayusculas
			$cdestino = strtoupper($_POST['cdestino']);
			$nombre_apellido = strtoupper($_POST['nombre_apellido']);
			$dni = $_POST['dni'];
			$cod_vuelo = $_POST['cod_vuelo'];
			$fecha_vuelo = $_POST['fecha_vuelo'];
			$cod_reserva = $_POST['cod_reserva'];
			$categoria = strtoupper($_POST['categoria']);		
			$marca = strtoupper($_POST['marca']);
			$modelo = strtoupper($_POST['modelo']);
			$fecha_reserva = $_POST['fecha_reserva'];
			$aeropOrigen = strtoupper($_POST['aeropOrigen']);
			$aeropDestino = strtoupper($_POST['aeropDestino']);
			$cod_pago = $_POST['cod_pago'];
			$importe = $_POST['importe'];
			$pago_descr = strtoupper($_POST['pago_descr']);
			$nro_tarjeta = $_POST['nro_tarjeta'];
			$provOrigen = strtoupper($_POST['provOrigen']);
			$provDestino = strtoupper($_POST['provDestino']);
			$hora_vuelo = $_POST['hora_vuelo'];
			
			$pdf = new PDF();             //Crea objeto PDF
			$pdf->AddPage('P', 'Letter'); //pagina Vertical, Carta

			//imagenes
			$pdf->Image('temp/pasajeElectronico.png', 5,5, 200);//imagen (movim en x, movim en y, tamaño imagen)
			
			//celdas
			$pdf->SetFont('Arial','B',11); //Arial, negrita, 11 puntos
			
			$pdf->SetXY(14,25);//posiciona celda (movim en x, movim en y)
			$pdf->Cell(20,10,$nombre_apellido);// celda (ancho, alto, texto a mostrar)
			
			$pdf->SetXY(14,29);
			$pdf->Cell(20,10,"DNI ".$dni);
													//Tener en cuenta que el orden de las imagenes y campos afecta la visualizacion del pdf
			$pdf->SetXY(163,30);
			$pdf->Cell(20,10,$cod_reserva);
			
			$pdf->SetXY(150,43);
			$pdf->Cell(35,10,$fecha_reserva);
			
			$pdf->SetXY(14,42);
			$pdf->Cell(50,10,$corigen);
			
			$pdf->SetXY(14,46);
			$pdf->Cell(50,10,$provOrigen);
			
			$pdf->SetXY(14,50);
			$pdf->Cell(50,10,$aeropOrigen);
			
			$pdf->SetXY(14,60);
			$pdf->Cell(50,10,$cdestino);
			
			$pdf->SetXY(14,64);
			$pdf->Cell(50,10,$provDestino);
			
			$pdf->SetXY(14,68);
			$pdf->Cell(50,10,$aeropDestino);
			
			$pdf->SetXY(14,77);
			$pdf->Cell(50,10,"CÓDIGO DE PAGO: ".$cod_pago);
			
			$pdf->SetXY(14,81);
			$pdf->Cell(50,10,"IMPORTE: $".$importe);
			
			$pdf->SetXY(14,85);
			$pdf->Cell(50,10,"TIPO DE PAGO: ".$pago_descr);
			
			if($nro_tarjeta!=0){
				$pdf->SetXY(14,89);
				$pdf->Cell(50,10,"NÚMERO DE TARJETA: ".$nro_tarjeta);
				}
			
			$pdf->SetXY(78,115);
			$pdf->MultiCell(30,7,substr($fecha_vuelo,0,10) .'      '. $hora_vuelo);
			
			$pdf->SetXY(55,118);
			$pdf->Cell(20,10,$cod_vuelo);
			
			$pdf->SetXY(108,118);
			$pdf->Cell(20,10,$categoria);  
			
			$pdf->SetXY(141,115);
			$pdf->Cell(20,10,$marca);
			
			$pdf->SetXY(142,120);
			$pdf->Cell(20,10,$modelo);
			
			ob_end_clean(); //evita el error "Some data has already been output, can't send PDF file"
			
			$pdf->Output();               //Salida al navegador
		?>
	</body>
</html>
