<?php
// agregamos la bibliotecas necesarias
require_once ('/jpgraph/src/jpgraph.php');
require_once ('/jpgraph/src/jpgraph_bar.php');
//definimos los datos
$datos = array(5,8,5,6,5,2,25,8,10);
// Definir ancho y alto del grafico
$ancho = 350; $alto = 200;
//crear la instancia del objeto graph
$graph = new Graph($ancho, $alto, 'auto');
//especificar la escala
$graph-> SetScale('textlin');
//crear curva
$curva = new BarPlot($datos);
// Configuraciones del grafico 
// agregar la curva al grafico
$graph->Add($curva);
 // mostrar el grafico
$graph->Stroke();
?>