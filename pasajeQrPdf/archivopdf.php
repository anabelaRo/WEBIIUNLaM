<html>
<head><title>html a pdf</title></head>
<body>



<?php
 require('fpdf17/fpdf.php'); //utiliza la clase fpdf
 
 
 class PDF extends FPDF { // PDF hereda de FPDF, utiliza sus funciones
 
}
		$ciudadOrigen = $_POST['ciudadOrigen'];
		$ciudadDestino = $_POST['ciudadDestino'];
		$categoria = $_POST['categoria'];
  
        $pdf = new PDF();             //Crea objeto PDF
        $pdf->AddPage('P', 'Letter'); //pagina Vertical, Carta
 
		//imagenes
		
		$pdf->Image('temp/boardingpass.png', 5,5, 200);//imagen (movim en x, movim en y, tamaño imagen)
		$pdf->Image('temp/test37698d59e694490fc5dfadf917d15171.png', 145,35, 53);
		
		//celdas
        $pdf->SetFont('Arial','B',11); //Arial, negrita, 11 puntos
		
		$pdf->SetXY(14,30);
		$pdf->Cell(20,10,'JOSE PEREZ');
		
		$pdf->SetXY(96.5,30);//posiciona celda (movim en x, movim en y)
		$pdf->Cell(20,10,$categoria);// celda (ancho, alto, texto a mostrar)  
		
		$pdf->SetXY(14,45);
		$pdf->Cell(20,10,$ciudadOrigen);
		
		$pdf->SetXY(96.5,45);
		$pdf->Cell(20,10,$ciudadDestino);
		
		$pdf->SetXY(21,67);
		$pdf->Cell(20,10,'LA 4640');
		
		$pdf->SetXY(51,67);
		$pdf->Cell(20,10,'01/07/2014');
		
		$pdf->SetXY(83,67);
		$pdf->Cell(20,10,'12342AS');
		
		$pdf->SetXY(120,67);
		$pdf->Cell(20,10,'35 / A');
		
		
		
		 
		ob_end_clean(); //evita el error "Some data has already been output, can't send PDF file"
        $pdf->Output();               //Salida al navegador
 
?>


</body>
</html>
