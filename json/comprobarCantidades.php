<?php 
$database=mysqli_connect("localhost","tfg_admin","","tfg");
$return="ok";
$array=array();
$query="Select inventario from articulos where ident=".$_POST["articulos"][0];
$res=mysqli_query($database,$query);
    if(!$res){
        die("Error en la query $query");
    }else{
        $cnt=mysqli_fetch_object($res);
        if($cnt->inventario>=$_POST["articulos"][1]){
            //se puede vender
        }else{
            //faltan
            $return=$cnt->inventario;
            
        }
    }

echo($return);    

?>