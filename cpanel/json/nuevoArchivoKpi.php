<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
$dataY=array();
$dataX=array();
$x="";
$y="";
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="SELECT ".$_POST["data"][2].", ".$_POST["data"][3]." FROM ".$_POST["data"][1].";";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{

    while($res=mysqli_fetch_array($query)){
        $dataX[]=$res[0];
        $dataY[]=$res[1];
        $x.=$res[0].",";
        $y.=$res[1].",";
        
    }
}
$x=substr($x,0,strlen($x)-1);
$y=substr($y,0,strlen($y)-1);
echo "<br>";
mysqli_close($database);
unset($query);
unset($consulta);
/*CREAMOS FICHERO*/
$myfile = fopen("../graficos/".$_POST["data"][0].".php", "w") or die("Unable to open file!");
$cabecera='<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php");';
$creaGrafico='// Create the graph. These two calls are always required 
$graph = new Graph(450,250,"auto");	
$graph->SetScale("textlin"); 
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); ';

$crearLinearPlot='// Create the linear plot 
$ydata = array('.$y.'); 
$lineplot=new LinePlot($ydata); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
$lineplot->SetLegend("'.$_POST["data"][3].'"); 
';
$marginsTitles='// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("'.$_POST["data"][0].'"); 
$graph->xaxis->title->Set("'.$_POST["data"][2].'"); 
$graph->yaxis->title->Set("'.$_POST["data"][3].'"); 
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