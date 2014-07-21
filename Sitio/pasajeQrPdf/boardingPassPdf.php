<html>
<head>
		<title>Aerolíneas Del Plata</title>
</head>
<body>



<?php
 require('fpdf17/fpdf.php'); //utiliza la clase fpdf
 header('Content-Type: text/html;charset=iso-8859-1');//soluciona visualizacion de tildes
 
 class PDF extends FPDF { // PDF hereda de FPDF, utiliza sus funciones
 
}
		$corigen = strtoupper($_POST['corigen']);//strtoupper convierte a mayusculas
		$cdestino = strtoupper($_POST['cdestino']);
		$nombre_apellido = strtoupper($_POST['nombre_apellido']);
		$codigo = $_POST['codigo'];
		$fecha_vuelo = $_POST['fecha_vuelo'];
		$cod_reserva = $_POST['cod_reserva'];
		$cod_asiento = strtoupper($_POST['cod_asiento']);
		$categoria = $_POST['categoria'];
  
        $pdf = new PDF();             //Crea objeto PDF
        $pdf->AddPage('P', 'Letter'); //pagina Vertical, Carta
 
		//imagenes
		
		$pdf->Image('temp/boardingpass.png', 5,5, 200);//imagen (movim en x, movim en y, tamaño imagen)
		$pdf->Image('temp/test37698d59e694490fc5dfadf917d15171.png', 145,35, 53);
		
		//celdas
        $pdf->SetFont('Arial','B',11); //Arial, negrita, 11 puntos
		
		$pdf->SetXY(14,30);
		$pdf->Cell(20,10,$nombre_apellido);
		
		$pdf->SetXY(96.5,30);//posiciona celda (movim en x, movim en y)
		$pdf->Cell(20,10,$categoria);// celda (ancho, alto, texto a mostrar)  
		
		$pdf->SetXY(14,45);
		$pdf->Cell(20,10,$corigen);
		
		$pdf->SetXY(96.5,45);
		$pdf->MultiCell(40,10,$cdestino);
		
		$pdf->SetXY(27,67);
		$pdf->Cell(20,10,$codigo);
		
		$pdf->SetXY(51,67);
		$pdf->MultiCell(35,10,$fecha_vuelo);
		
		$pdf->SetXY(87,67);
		$pdf->Cell(20,10,$cod_reserva);
		
		$pdf->SetXY(120,67);
		$pdf->Cell(20,10,$cod_asiento);
		
		
		
		 
		ob_end_clean(); //evita el error "Some data has already been output, can't send PDF file"
        $pdf->Output();               //Salida al navegador
 
?>


</body>
</html>
