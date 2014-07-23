<?php
require_once ('/jpgraph/src/jpgraph.php');
require_once ('/jpgraph/src/jpgraph_bar.php');

$fecha_desde = $_GET['fecha_desde'];
$fecha_hasta = $_GET['fecha_hasta'];
$cdestino = $_GET['cdestino'];

$mysqli= new mysqli("localhost","root", "", "aerolinea");

if($mysqli->connect_errno){
}
$resultado=$mysqli->query ("select clase_pasaje, cd.descripcion, count(p.cod_reserva) 
							from pasaje as p 
							join vuelo as v on p.cod_vuelo=v.codigo 
							join aeropuerto ao on v.origen = ao.codigo_OACI 
							join ciudad co on ao.ciudad = co.codigo 
							join aeropuerto ad on v.destino = ad.codigo_OACI 
							join ciudad cd on ad.ciudad = cd.codigo 
							where cd.descripcion = '$cdestino' 
							and	p.fecha_vuelo BETWEEN '$fecha_desde' AND '$fecha_hasta' 
							group by clase_pasaje");

$clase=array();
$cant_pasaje=array();
 //var_dump($resultado);
 
while($row=$resultado->fetch_assoc()){
   $cant_pasaje[]=$row['count(p.cod_reserva)'];
   $clase[]=$row['clase_pasaje'];
}


//var_dump($clase);
//var_dump($cant_pasaje);	

// Creamos el grafico
$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Cantidad de pasajes vendidos por categoría y por destino");
$grafico->subtitle->Set("Desde $fecha_desde hasta $fecha_hasta 
Destino: $cdestino  
(Referencia e:Economy - p:Primera)");
$grafico->xaxis->title->Set("Clase");
$grafico->xaxis->SetTickLabels($clase);
$grafico->yaxis->title->Set("Cantidad de pasajes");
$barplot1 =new BarPlot($cant_pasaje);
// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);
// 30 pixeles de ancho para cada barra
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke();
?>