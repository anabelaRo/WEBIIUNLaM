<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');


$fecha_desde = $_GET['fecha_desde'];
$fecha_hasta = $_GET['fecha_hasta'];
$cdestino = $_GET['cdestino'];
$codigo = $_GET['codigo'];

$mysqli= new mysqli("localhost","root", "", "aerolinea");

if($mysqli->connect_errno){
}
$resultado=$mysqli->query ("select av.total_pasajes, count(p.cod_reserva) 
							from pasaje as p 
							join vuelo as v on p.cod_vuelo=v.codigo 
							join aeropuerto ao on v.origen = ao.codigo_OACI 
							join ciudad co on ao.ciudad = co.codigo 
							join aeropuerto ad on v.destino = ad.codigo_OACI 
							join ciudad cd on ad.ciudad = cd.codigo 
							join avion av on v.cod_avion=av.codigo 
							where cd.descripcion = '$cdestino' 
							and p.fecha_vuelo BETWEEN '$fecha_desde' AND '$fecha_hasta' 
							and av.codigo=$codigo");

 
while($row=$resultado->fetch_assoc()){
   $cant_pasaje=$row['count(p.cod_reserva)'];
   $total_pasajes=$row['total_pasajes'];
}

 /*echo "<br>cant de pasaje";
 echo var_dump($cant_pasaje);
  echo "<br>total de avion";
  var_dump($total_pasajes);*/

// Some data
$data = array($total_pasajes,$cant_pasaje);

// Create the Pie Graph. 
$graph = new PieGraph(650,380);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Ocupación por avión y destino");
$leyenda = array("Total asientos","Ocupación");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($leyenda);
$graph->legend->SetPos(0.5, 0.9,'center','top');

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();


?>

