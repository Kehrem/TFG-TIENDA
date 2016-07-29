<?php 
session_start();

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$select = "Select * from usuarios where email='".$_SESSION["email"]."'";

$res=mysqli_query($database,$select);

if(!$res){
    die("Error en la query: ".$res."<br>");
}

if(mysqli_num_rows($res)>0){
    $dev=mysqli_fetch_object($res);
    $n=utf8_encode($dev->nombre);
    $ap=utf8_encode($dev->apellidos);
    $img=$dev->url_Img;
    $em=utf8_encode($dev->email);
    $ret=array($n,$ap,$img,$em);
    echo json_encode($ret);  
}

?>