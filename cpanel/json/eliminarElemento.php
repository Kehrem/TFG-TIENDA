<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="DELETE FROM elementosportada where ident=".$_POST["id"].";";

$query=mysqli_query($database,$consulta);

if(!$query){
    die ("Error en la query $consulta");
}else{
    echo "ok";
}
mysqli_close($database);
    

?>