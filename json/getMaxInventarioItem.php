<?php 
$database=mysqli_connect("localhost","tfg_admin","","tfg");

    $query="Select inventario from articulos where ident=".$_POST["articulos"];
    $res=mysqli_query($database,$query);
    if(!$res){
        echo ("error");
        die("Error en la query $query");
    }else{
        $cnt=mysqli_fetch_object($res);
       echo $cnt->inventario;
    }
?>