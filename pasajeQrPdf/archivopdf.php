<html>
<head><title>html a pdf</title></head>
<body>



<?php
 require('fpdf17/fpdf.php'); 
 
 
 class PDF extends FPDF {   
 
 
 
    function ImprimirTexto($file)
    {
        // Leemos el archivo de texto
        $txt = file_get_contents($file);
        /*
         * Arial - Fuente
         * '' - cadena vacía significa imrpimir el texto normal o
         *      se puede poner en Negrita 'B', Italico 'I' o Subrayado 'U'
         *      o una combinación de éstos.
         * 12 - tamaño de fuente
         * */
        $this->SetFont('Arial','',12);
        /*
         * 0 - el ancho se ajusta al margen de la hoja
         * 5 - alto de la celda
         * $txt - Texto a imrpimir.
         * NOTA: Los valores para justificar el texto y celda sin borde
         *       no los pasé, porque son valores por defecto del mismo método
         *
         * Pero quedaría así: MutiCell(0, 5, $txt, 0, 'J')
         **/
        $this->MultiCell(0,5,$txt);
 
    }
 
}//fin clase PDF
		$ciudadOrigen = $_POST['ciudadOrigen'];
		$ciudadDestino = $_POST['ciudadDestino'];
		$categoria = $_POST['categoria'];
  
        $pdf = new PDF();             //Crea objeto PDF
        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
 
		//imagenes
		$pdf->Cell(1,1,'',1,1,'L',$pdf->Image('temp/boardingpass.png', 5,5, 200));
		
		$pdf->Cell(1,1,'',1,1,'D',$pdf->Image('temp/test37698d59e694490fc5dfadf917d15171.png', 145,35, 53));
		
		//celdas
        $pdf->SetFont('Arial','B',11); //Arial, negrita, 11 puntos
        //$pdf->Cell(80,5,$ciudadOrigen,1,2,'L'); //Agrega ciudad de origen (ancho,alto)
		
        //$pdf->Cell(80,5,$ciudadDestino,1,30,'L'); //Agrega ciudad de destino
		
        //$pdf->Cell(80,5,$categoria,1,500,'L'); //Agrega categoria
		$pdf->SetXY(96.5,30);
		$pdf->Cell(20,10,$categoria,0,1);  
		
		$pdf->SetXY(14,45);
		$pdf->Cell(20,10,$ciudadOrigen,0,1);
		
		$pdf->SetXY(96.5,45);
		$pdf->Cell(20,10,$ciudadDestino,0,1);
		
		
        /* Se hace un salto de línea
         * y se manda llamar el método de imprimir texto,
         * envíando como parámetro el nombre del archivo
         * que contiene el texto.
        * */
        $pdf->Ln();
        $pdf->ImprimirTexto('textoFijo.txt');
 
		ob_end_clean(); //evita el error "Some data has already been output, can't send PDF file"
        $pdf->Output();               //Salida al navegador
 
?>


</body>
</html>
