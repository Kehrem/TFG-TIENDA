<?php 
$database=mysqli_connect("localhost","tfg_admin","","tfg");


$return="ok";
$array=array();
for($i=0;$i<sizeof($_POST["articulos"]);$i++){
    $query="Select inventario from articulos where ident=".$_POST["articulos"][$i][0];
    $res=mysqli_query($database,$query);
    if(!$res){
        die("Error en la query $query");
    }else{
        $cnt=mysqli_fetch_object($res);
        if($cnt->inventario>=$_POST["articulos"][$i][7]){
            //se puede vender
        }else{
            //faltan
            $return="error";
            $array[]=array($_POST["articulos"][$i][0],$_POST["articulos"][$i][2],$cnt->inventario);
        
        }
    }  
}

if($return=="ok"){
    echo $return;
}else{
    echo json_encode($array);
    
}
?>