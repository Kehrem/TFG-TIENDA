<?php 

$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="DELETE FROM graficas_kpis where ident=".$_POST["id"].";";
$consulta2="DELETE FROM kpis where ident_graficasKpis=".$_POST["id"].";";
$query=mysqli_query($database,$consulta);
$query2=mysqli_query($database,$consulta2);
if(!$query || !$query2){
    die ("Error en las querys $consulta y/o $consulta2");
}else{
    echo "ok";
}
mysqli_close($database);
    

?>