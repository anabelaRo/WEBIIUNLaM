<?php
require_once ('/jpgraph/src/jpgraph.php');
require_once ('/jpgraph/src/jpgraph_bar.php');


$fecha_desde = $_GET['fecha_desde'];
$fecha_hasta = $_GET['fecha_hasta'];
$mysqli= new mysqli("localhost","root", "", "aerolinea");

if($mysqli->connect_errno){
}
$resultado=$mysqli->query ("select date(fecha_vuelo), count(cod_reserva) 
									from pasaje					
									WHERE fecha_vuelo BETWEEN '$fecha_desde' AND '$fecha_hasta'
									group by fecha_vuelo");

$fecha=array();
$cant_pasaje=array();

while($row=$resultado->fetch_assoc()){
   $cant_pasaje[]=$row['count(cod_reserva)'];
   $fecha[]=$row['date(fecha_vuelo)'];
}	
//echo"<br> cantidad de pasajes ";
//var_dump($cant_pasaje);
//
//echo"<br> fecha ";
//var_dump($fecha);
		

// Creamos el grafico
$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Cantidad de pasajes vendidos");
$grafico->subtitle->Set("(Desde $fecha_desde hasta $fecha_hasta)");
$grafico->xaxis->title->Set("Fecha");
$grafico->img-> SetMargin(50,30 ,30,50);
$grafico->xaxis->SetTickLabels($fecha);
$grafico->yaxis->title->Set("Cantidad de pasajes");
$barplot1 =new BarPlot($cant_pasaje);
// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);
// 30 pixeles de ancho para cada barra
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke();
?>