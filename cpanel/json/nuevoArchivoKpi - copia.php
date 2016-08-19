<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
$rows=array();
$cols=array();
$x="";
$y="";
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="SELECT ".$_POST["data"][2][0].", ".$_POST["data"][3][0]." FROM ".$_POST["data"][1][0]." order by ".$_POST["data"][2][0].";";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
            $tipox="none";
        $tipoc=$_POST["data"][2][1];
        if(strpos($tipoc,"int")===false){
            
        }else{
            $tipox="number";
        }
        if(strpos($tipoc,"varchar")===false){
            
        }else{
            $tipox="string";
        }
        if(strpos($tipoc,"date")===false){
            
        }else{
            $tipox="string";
        }
        if(strpos($tipoc,"float")===false){
            
        }else{
            $tipox="number";
        }

    while($res=mysqli_fetch_array($query)){
        if($tipox=="string"){
            $x.='"'.$res[0].'",';
        }else{
            $x.=$res[0].",";
        }
        
        $y.=$res[1].",";
    }
}

//echo json_encode($x);
$x=substr($x,0,strlen($x)-1);
$y=substr($y,0,strlen($y)-1);
echo "<br>";
mysqli_close($database);
unset($query);
unset($consulta);
if($tipox=="text"){
        $scale='$graph->SetScale("textlin"); 
';
}
if($tipox=="date"){
    $scale='$graph->SetScale("datelin"); 
';
}
if($tipox=="int" || $tipox=="float"){

}

/*CREAMOS FICHERO*/
$myfile = fopen("../graficos/".$_POST["data"][0].".php", "w") or die("Unable to open file!");
$cabecera='<?php 
require_once("../jpgraph/jpgraph.php"); 
require_once("../jpgraph/jpgraph_line.php"); 
require_once("../jpgraph/jpgraph_bar.php");';
$creaGrafico='// Create the graph. These two calls are always required 
$datay = new BarPlot(array('.$y.')); 
$datax=array('.$x.');
$graph = new Graph(450,250,"auto");	
$graph->SetScale("textlin");
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
$graph->xaxis->SetTickLabels($datax);
$graph->yaxis->title->Set("'.$_POST["data"][3][0].'"); 
$graph->ygrid->SetFill(true,"#EFEFEF@0.5","#F9BB64@0.5");';

$endFile='
// Add the plot to the graph 
$graph->Add($datay); 

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