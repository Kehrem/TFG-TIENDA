<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php"); 
require_once("../jpgraph/jpgraph_bar.php");// Create the graph. These two calls are always required 
$datay = new BarPlot(array(4.5,0,4)); 
$datax=array("Hueso de Aceituna","Hueso Granel","Saco Pellets certificado 15 Kg");
$graph = new Graph(450,250,"auto");	
$graph->SetScale("textlin");
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); // Create the linear plot 
$lineplot=new LinePlot($datay); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
$lineplot->SetLegend("precio"); 
// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("Francisco"); 
$graph->xaxis->title->Set("nombre"); 
$graph->xaxis->SetTickLabels($datax);
$graph->yaxis->title->Set("precio"); 
$graph->ygrid->SetFill(true,"#EFEFEF@0.5","#F9BB64@0.5");
// Add the plot to the graph 
$graph->Add($datay); 

// Display the graph 
$graph->Stroke(); 
?>