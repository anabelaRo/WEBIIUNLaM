<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');

// Some data
$data = array(40,60,21,33);

// Create the Pie Graph. 
$graph = new PieGraph(350,200);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("TORTA 3D - EJEMPLO");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>