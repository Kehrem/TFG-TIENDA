<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php");// Create the graph. These two calls are always required 
$graph = new Graph(450,250,"auto");	
$graph->SetScale("textlin"); 
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); // Create the linear plot 
$ydata = array(0,4,4.5); 
$lineplot=new LinePlot($ydata); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
$lineplot->SetLegend("precio"); 
// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("aaaa"); 
$graph->xaxis->title->Set("ident"); 
$graph->yaxis->title->Set("precio"); 
$graph->ygrid->SetFill(true,"#EFEFEF@0.5","#F9BB64@0.5");
// Add the plot to the graph 
$graph->Add($lineplot); 

// Display the graph 
$graph->Stroke(); 
?>