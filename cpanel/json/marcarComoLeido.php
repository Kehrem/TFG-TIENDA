<?php 

$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="UPDATE admin_avisos SET leido=1 where ident=".$_POST["id"].";";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en las querys $consulta");
}else{
    echo "ok";
}
mysqli_close($database);
    

?>