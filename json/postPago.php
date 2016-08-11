<?php 
session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$selectIdentUsuario="Select ident from usuarios where email='".$_SESSION["email"]."'";
$res=mysqli_query($database,$selectIdentUsuario);
if(!$res){
    die("Error en la query $selectIdentUsuario<br>");
}
$identUsuario=mysqli_fetch_object($res);
$idUsuario=$identUsuario->ident;

//creamos el pedido
$caracteres="abcdefgijklmnopqrstuvxyz01234567890";
$ret="";
for($it=0;$it<11;$it++){
 $ret.=$caracteres[rand(0,strlen($caracteres)-1)];    
}
$fecha=date("Y-m-d");
$sqlPedido="INSERT into pedidos (ident,ident_usuario,fecha) values('".$ret."',".$idUsuario.",".$fecha.")";

$res=mysqli_query($database,$sqlPedido);
if(!$res){
    die("Error en la query $sqlPedido<br>"); 
}

$sqlLineasPedidos="INSERT INTO lineasPedido(ident,identPedido,identArticulo,cantidad)";

$
//creamos las lineas de pedido
$

?>