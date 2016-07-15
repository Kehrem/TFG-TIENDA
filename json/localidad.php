<?php 

$end="";
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$nombre=$_POST["nombreycp"][0];
$cp=$_POST["nombreycp"][1];
$querymod=-1;
if($cp==""){
$query="SELECT * FROM localidades where nombre ='$nombre'";
    $querymod=0;
}else{
    $query="SELECT * FROM localidades where nombre='$nombre' and cp='$cp'";
    $querymod=1;
}

$res=mysqli_query($database,$query);

if($res==true){
        //echo $query."-- success<br>";
    }else{
         die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
    }


$nr=mysqli_num_rows($res);
if($nr>0){
   $end="Ok - querymod=$querymod";
    
}else{
    
    $end="Error 0";
    
}

//var_dump($ret);
mysqli_close($database);
unset($database);
unset($cp);
unset($query);
unset($res);
unset($nr);
echo(utf8_encode($end));


?>