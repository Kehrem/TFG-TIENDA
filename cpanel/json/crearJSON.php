<?php 


/*CREAMOS FICHERO*/
$myfile = fopen("../data/".$_POST["data"][0].".php", "w") or die("Unable to open file!");
$cabecera='<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php");';
$creaGrafico='// Create the graph. These two calls are always required 
$datay = array('.$y.'); 
$datax=array('.$x.');
$graph = new Graph(450,250,"auto");	
'.$scale.'
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); ';

$crearLinearPlot='// Create the linear plot 
$lineplot=new LinePlot($datay); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
$lineplot->SetLegend("'.$_POST["data"][3][0].'"); 
';
$marginsTitles='// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("'.$_POST["data"][0].'"); 
$graph->xaxis->title->Set("'.$_POST["data"][2][0].'"); 
$graph->yaxis->title->Set("'.$_POST["data"][3][0].'"); 
$graph->ygrid->SetFill(true,"#EFEFEF@0.5","#F9BB64@0.5");';

$endFile='
// Add the plot to the graph 
$graph->Add($lineplot); 

// Display the graph 
$graph->Stroke(); 
?>';
fwrite($myfile, $cabecera);
fwrite($myfile, $creaGrafico);
fwrite($myfile, $crearLinearPlot);
fwrite($myfile, $marginsTitles);
fwrite($myfile, $endFile);
fclose($myfile);
/*FIN FICHERO*/
unset($array);
?>