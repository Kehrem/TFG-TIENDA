<?php 



$database=mysqli_connect("localhost","tfg_admin","","tfg");

//Lo busco en usuarios temp porque si lo busco en usuarios podría no encontrarlo porque todavía no ha validado y si estar en la tabla usuarios_temp. 
$consulta="SELECT * FROM usuarios_temp where email='".$_POST["data"]."';";

$query=mysqli_query($database,$consulta);

$ret=mysqli_num_rows($query);

if($query==true){
        
    }else{
         die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
    }

unset($query);
unset($consulta);
mysqli_close($database);
echo $ret;

?>