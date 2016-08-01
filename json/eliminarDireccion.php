<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$query="delete from usuarios_facturacion where ident=".$_POST['data'].";";

$res=mysqli_query($database,$query);

if(!$res){
    die("Error en la query $query");
}else{
    
}
echo "ok";

mysqli_close($database);
?>