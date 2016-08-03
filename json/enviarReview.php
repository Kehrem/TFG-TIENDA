<?php 
session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$fecha=date('Y-m-d H:i:s');
$query="INSERT INTO articulos_puntuaciones(ident_articulo,ident_usuario,puntuacion,fecha,comentario) SELECT ".$_POST["ident"].", ident, ".$_POST["puntuacion"].", '$fecha', '".$_POST["contenido"]."' from usuarios where email='".$_SESSION["email"]."';";


$res=mysqli_query($database,$query);

if(!$res){
    die("Error en la query $query");
}else{
    echo "ok";
}


mysqli_close($database);

?>