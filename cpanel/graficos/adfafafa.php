<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php"); 
require_once("../jpgraph/jpgraph_bar.php");// Create the graph. These two calls are always required 
$datay = new BarPlot(array(1,2,3)); 
$datax=array(1,2,3);
$graph = new Graph(450,250,"auto");	
$graph->SetScale("textlin");
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); // Create the linear plot 
$lineplot=new LinePlot($datay); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
$lineplot->SetLegend("ident"); 
// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("adfafafa"); 
$graph->xaxis->title->Set("ident"); 
$graph->xaxis->SetTickLabels($datax);
$graph->yaxis->title->Set("ident"); 
$graph->ygrid->SetFill(true,"#EFEFEF@0.5","#F9BB64@0.5");
// Add the plot to the graph 
$graph->Add($datay); 

// Display the graph 
$graph->Stroke(); 
?>