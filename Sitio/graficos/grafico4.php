<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');

$fecha_desde = $_GET['fecha_desde'];
$fecha_hasta = $_GET['fecha_hasta'];

$mysqli= new mysqli("localhost","root", "", "aerolinea");

if($mysqli->connect_errno){
}
$resultado=$mysqli->query ("SELECT count(p.cod_reserva) 
							FROM pasaje p 
							WHERE p.fecha_vuelo BETWEEN '$fecha_desde' AND '$fecha_hasta' 
							and NOT EXISTS 
								(SELECT 1 
									FROM pago 
									WHERE p.cod_reserva=pago.cod_reserva 
									AND pago.importe is not null)");
									

$resultado2=$mysqli->query ("SELECT count(pas.cod_reserva) 
							FROM pasaje pas 
							WHERE pas.fecha_vuelo BETWEEN '$fecha_desde' AND '$fecha_hasta' ");

							
							
while($row=$resultado->fetch_assoc()){
   $cant_pasaje_caido=$row['count(p.cod_reserva)'];
}


while($row=$resultado2->fetch_assoc()){
   $cant_pasaje_total=$row['count(pas.cod_reserva)'];
}


// Some data
$data = array($cant_pasaje_total,$cant_pasaje_caido);
$leyenda = array("Reservas confirmadas","Reservas caídas");

// Create the Pie Graph. 
$graph = new PieGraph(650,380);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Cantidad de reservas caídas");
$graph->legend;
$graph->legend->SetPos(0.5, 0.9,'center','top');

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($leyenda);
$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>