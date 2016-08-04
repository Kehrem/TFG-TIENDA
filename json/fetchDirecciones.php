<?php 

session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");

$query="Select usuarios_facturacion.ident, usuarios_facturacion.ident_usuario, usuarios_facturacion.codigo_postal, usuarios_facturacion.localidad, usuarios_facturacion.direccion, usuarios_facturacion.telefono, usuarios_facturacion.nombre_direccion from usuarios_facturacion,usuarios where usuarios.ident=usuarios_facturacion.ident_usuario and usuarios.email='".$_SESSION["email"]."'";

$res=mysqli_query($database,$query);
if(!$res){
    die("Error en la query $res");
}else{
    $array=array();
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_object($res)){
            $array[]=array("ident"=>$row->ident,
                          "cp"=>$row->codigo_postal,
                          "localidad"=>$row->localidad,
                          "direccion"=>$row->direccion,
                          "telefono"=>$row->telefono,
                          "nombre"=>$row->nombre_direccion);
        }
        echo json_encode($array);
    }else{
        echo "sin direcciones";
    }
}

?>