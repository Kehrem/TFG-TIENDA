<?php 
session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$query="Select * from articulos_puntuaciones, usuarios where articulos_puntuaciones.ident_articulo=".$_POST["ident"]." and articulos_puntuaciones.ident_usuario=usuarios.ident and usuarios.email='".$_SESSION["email"]."';";


$res=mysqli_query($database,$query);

if(!$res){
    die("Error en la query $query");
}else{
    if(mysqli_num_rows($res)>0){
        echo "ya ha votado";
    }else{
        echo "puede votar";
    }
}

unset($res);
unset($query);
mysqli_close($database);
unset($database);
?>