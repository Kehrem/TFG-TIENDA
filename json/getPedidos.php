<?php 
session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");

    $query="select pedidos.ident, articulos.nombre, articulos.url_Img, articulos.precio, lineaspedido.cantidad, pedidos.estado from pedidos,lineaspedido,usuarios,articulos where pedidos.ident_usuario=usuarios.ident and usuarios.email='".$_SESSION["email"]."' and lineaspedido.identPedido=pedidos.ident and lineaspedido.identArticulo=articulos.ident";
    $res=mysqli_query($database,$query);
$array=array();
    if(!$res){
        echo ("error");
        die("Error en la query $query");
    }else{
        if(mysqli_num_rows($res)>0){
            while($cnt=mysqli_fetch_object($res)){
                $array[]=array("ident"=>$cnt->ident,
                              "nombre"=>$cnt->nombre,
                              "url_Img"=>$cnt->url_Img,
                              "precio"=>$cnt->precio,
                              "cantidad"=>$cnt->cantidad,
                              "estado"=>$cnt->estado);
            }
            echo json_encode($array);
        }else{
            echo "sin pedidos";
        }
    }
?>