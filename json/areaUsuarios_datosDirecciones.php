<?php 
session_start();

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$select = "Select usuarios_facturacion.codigo_postal, usuarios_facturacion.localidad, usuarios_facturacion.direccion, usuarios_facturacion.telefono,  usuarios_facturacion.nombre_direccion, usuarios_facturacion.ident from usuarios_facturacion,usuarios where usuarios.email='".$_SESSION["email"]."' and usuarios_facturacion.ident_usuario=usuarios.ident";

$res=mysqli_query($database,$select);

if(!$res){
    die("Error en la query: ".$res."<br>");
}

if(mysqli_num_rows($res)>0){
    while($dev=mysqli_fetch_object($res)){
        $cp=$dev->codigo_postal;
        $l=utf8_encode($dev->localidad);
        $d=$dev->direccion;
        $t=$dev->telefono;
        $n=utf8_encode($dev->nombre_direccion);
        $i=$dev->ident;
        $ret[]=array($cp,$l,$d,$t,$n,$i);
    }
    echo json_encode($ret);  
}

?>