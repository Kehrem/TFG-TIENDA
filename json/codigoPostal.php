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
    $query="SELECT * FROM localidades where cp='$cp' and nombre like '$nombre%'";
    $querymod=1;
}

$res=mysqli_query($database,$query);

if($res==true){
        
    }else{
         die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
    }


$nr=mysqli_num_rows($res);
if($nr>0){
    
    $end="Ok - querymod=$querymod";
    
}else{
    
    if($querymod==1){
        //podría ser que haya escrito el nombre de la ciudad de referencia, comprobar
        $query="SELECT * FROM localidades,ciudades_referencia where localidades.cp='$cp' and ciudades_referencia.nombre like '$nombre%'";

        $res2=mysqli_query($database,$query);

        if($res==true){
            //echo $query."-- success<br>";
        }else{
             die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
        }
        $nr2=mysqli_num_rows($res2);

        if($nr2>0){
            $end="Ok - querymod=$querymod";
        }else{
            $end="Error 0";    
        }
        }else{
            //el codigo postal no es correcto
            $end="Error 0";
    }
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