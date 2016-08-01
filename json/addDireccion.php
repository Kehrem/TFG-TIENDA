<?php 

session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");

//0--nombre
//1--cp
//2--localidad
//3--direccion
//4--telefono
$query="SELECT ident from usuarios where email='".$_SESSION["email"]."';";

$res=mysqli_query($database,$query);
if(!$res){
    die("Error en la query $query");

}else{
    $resobj=mysqli_fetch_object($res);
    $ident=$resobj->ident;
    $query2="insert into usuarios_facturacion(ident_usuario,codigo_postal,localidad,direccion,telefono,nombre_direccion) values (".$ident.",'".$_POST["data"][1][1]."','".$_POST["data"][2][1]."','".$_POST["data"][3][1]."','".$_POST["data"][4][1]."','".$_POST["data"][0][1]."');";
    $res2=mysqli_query($database,$query2);
    if(!$res){
        die("Error en la query $query2");
        
    }else{
        echo "ok";
    }
}

mysqli_close($database);


?>