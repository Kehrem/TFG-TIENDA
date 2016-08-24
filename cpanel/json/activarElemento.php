<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="UPDATE elementosportada SET activo=".$_POST["params"][1]." where ident=".$_POST["params"][0].";";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en las querys $consulta");
}else{
    echo "ok";
}
mysqli_close($database);
    

?>