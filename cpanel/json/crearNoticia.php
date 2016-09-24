<?php 
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$consulta="INSERT INTO noticias(nombre,cuerpo,publicar) values ('".$_POST["datos"][0]."','".$_POST["datos"][1]."',".$_POST["datos"][2].")";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    echo "ok";
}   

mysqli_close($database);
  


?>