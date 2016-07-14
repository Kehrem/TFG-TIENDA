<?php 

$end="";
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$nombre=$_POST["nombreycp"][0];
$cp=$_POST["nombreycp"][1];
$querymod=-1;
if(($nombre=="" || $nombre==" ") && sizeof($nombre>3)){
    $query="SELECT * FROM localidades where cp='$cp'";
    $querymod=0;
}else{
    $query="SELECT * FROM localidades where cp='$cp' and nombre = '$nombre'";
    $querymod=1;
}
var_dump($query);
$res=mysqli_query($database,$query);

if($res==true){
        
    }else{
         die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
    }


$nr=mysqli_num_rows($res);
if($nr>0){
    
    $end="Ok - querymod=$querymod";
    
}else{
    
    $end="Error 0";
    
}
echo(utf8_encode($end));

//var_dump($ret);
mysqli_close($database);
unset($database);
unset($cp);
unset($query);
unset($res);
unset($nr);


?>