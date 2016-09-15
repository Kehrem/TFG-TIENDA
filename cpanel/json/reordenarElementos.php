<?php 


$database=mysqli_connect("localhost","tfg_admin","","tfg");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="UPDATE elementosportada set orden=".$_POST["array"][0][1]." where ident=".$_POST["array"][0][0].";";

$query=mysqli_query($database,$consulta);

if(!$query){
    die ("Error en la query $consulta");
}

$consulta="UPDATE elementosportada set orden=".$_POST["array"][1][1]." where ident=".$_POST["array"][1][0].";";

$query=mysqli_query($database,$consulta);

if(!$query){
    die ("Error en la query $consulta");
}
echo "ok";
mysqli_close($database);
    
?>