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
        $cols[]=array("id"=>"",
                     "label"=>$res[0],
                     "pattern"=>"",
                     "type"=>$tipox);
        $rows[]=array("v"=>$res[1]);
    }
}
$send=array("cols"=>$cols,"rows"=>$rows);
//echo json_encode($send);

$myfile = fopen("../data/".$_POST["data"][0].".json", "w") or die("Unable to open file!");
$write=json_encode($send);
fwrite($myfile, $write);
fclose($myfile);
echo "ok";


?>