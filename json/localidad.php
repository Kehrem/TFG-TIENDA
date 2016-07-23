<?php 

$end="";
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$nombre=$_POST["nombreycp"][0];
$cp=$_POST["nombreycp"][1];
$querymod=-1;
$nombreret="";
if($cp==""){
    $query="SELECT * FROM localidades where nombre like '$nombre%' order by nombre";
    $querymod=0;
}else{
    $query="SELECT * FROM localidades where nombre like '$nombre%' and cp='$cp' order by nombre";
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
    
    $rr=mysqli_fetch_object($res);
    $nombreret=utf8_encode($rr->nombre);
    $end='Ok - querymod='.$querymod.' || '.$nombreret;
}else{  
   //compruebo si tiene nombre la ciudad de referencia
    if($querymod==0){
        $query="SELECT * FROM ciudades_referencia where nombre like '$nombre%'";
    }else{
        $query="SELECT ciudades_referencia.nombre FROM ciudades_referencia,localidades where ciudades_referencia.nombre like '".$nombre."%' and ciudades_referencia.ident=localidades.ciudad_referencia and localidades.cp='".$cp."'";
    }
    
    $res2=mysqli_query($database,$query);
    
    if($res==true){
        //echo $query."-- success<br>";
    }else{
         die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
    }
    $nr2=mysqli_num_rows($res2);
    if($nr2>0){
        
        $rr=mysqli_fetch_object($res2);
        $nombreret=utf8_encode($rr->nombre);
        $end='Ok - querymod='.$querymod.' || '.$nombreret;
    }else{   
        $end="Error 0";
    }
}



//var_dump($ret);
mysqli_close($database);
unset($database);
unset($cp);
unset($query);
unset($res);
unset($nr);
if($end!="Error 0"){
    echo(json_encode($end));
}else{
    echo $end;
}

?>