<?php 

session_start();

$database=mysqli_connect("localhost","tfg_admin","","tfg");

//0--nombre
//1--cp
//2--localidad
//3--direccion
//4--telefono

$query="Select usuarios_facturacion.ident from usuarios,usuarios_facturacion where usuarios.email='".$_SESSION["email"]."' and usuarios_facturacion.nombre_direccion='".$_POST["data"][0][0]."' and usuarios_facturacion.codigo_postal='".$_POST["data"][1][0]."' and usuarios_facturacion.localidad='".$_POST["data"][2][0]."' and usuarios_facturacion.direccion='".$_POST["data"][3][0]."'and usuarios_facturacion.telefono='".$_POST["data"][4][0]."' and usuarios_facturacion.ident_usuario=usuarios.ident order by usuarios_facturacion.nombre_direccion limit 1;";

$res=mysqli_query($database,$query);
if(!$res){
    die("Error en la query $query");

}else{
    $resobj=mysqli_fetch_object($res);
    $ident=$resobj->ident;
    $query2="update usuarios_facturacion set usuarios_facturacion.nombre_direccion='".$_POST["data"][0][1]."',  usuarios_facturacion.codigo_postal='".$_POST["data"][1][1]."', usuarios_facturacion.localidad='".$_POST["data"][2][1]."', usuarios_facturacion.direccion='".$_POST["data"][3][0]."'and usuarios_facturacion.telefono='".$_POST["data"][4][1]."' where ident=$ident;";
    $res2=mysqli_query($database,$query2);
    if(!$res){
        die("Error en la query $query2");
        
    }else{
        echo "ok";
    }
}

mysqli_close($database);


?>