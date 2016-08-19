<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php"); 
require_once("../jpgraph/jpgraph_bar.php");// Create the graph. These two calls are always required 
$datay = new BarPlot(array(0,0,0,0,0)); 
$datax=array("32321a","asdfa","ddddddd","fog1.furan@gmail.com","fog1.trabajo@gmail.com");
$graph = new Graph(450,250,"auto");	
$graph->SetScale("textlin");
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); // Create the linear plot 
$lineplot=new LinePlot($datay); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
$lineplot->SetLegend("numero_visitas"); 
// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("aaaa"); 
$graph->xaxis->title->Set("email"); 
$graph->xaxis->SetTickLabels($datax);
$graph->yaxis->title->Set("numero_visitas"); 
$graph->ygrid->SetFill(true,"#EFEFEF@0.5","#F9BB64@0.5");
// Add the plot to the graph 
$graph->Add($datay); 

// Display the graph 
$graph->Stroke(); 
?>