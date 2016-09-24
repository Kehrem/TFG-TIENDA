<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="UPDATE noticias SET nombre='".$_POST["datos"][0]."', cuerpo ='".$_POST["datos"][1]."', publicar=".$_POST["datos"][2]." where ident=".$_POST["datos"][3].";";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en las querys $consulta");
}else{
    echo "ok";
}
mysqli_close($database);
    

?>