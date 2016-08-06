<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$query="Select * from metodos_envio;";

$res=mysqli_query($database,$query);
if(!$res){
    die("Error en la query $res");
}else{
    $array=array();
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_object($res)){
            $array[]=array("ident"=>$row->ident,
                          "nombre"=>$row->nombre,
                          "descripcion"=>$row->descripcion,
                          "precio"=>$row->precio);
        }
        echo json_encode($array);
    }else{
       // echo "sin direcciones";
    }
}

?>