<?php 

$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="Select count(*) as sinLeer from admin_avisos where leido=0;";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en las query $consulta;");
}else{
    $n=mysqli_fetch_array($query);;
    //var_dump($n);
    echo $n["sinLeer"];
}
mysqli_close($database);
?>