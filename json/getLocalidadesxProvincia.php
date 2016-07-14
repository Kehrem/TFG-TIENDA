<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$consulta="SELECT * FROM localidades where categoria=".$_POST["provincia"]." order by nombre";
$query=mysqli_query($database,$consulta);

$arr_nombres=array();
while($res=mysqli_fetch_array($query)){
    
$arr_nombres[]=array('nombre'=>utf8_encode($res["nombre"]),
                     'descripcion'=>$res["descripcion"],
                    'url_Img'=>$res["url_Img"],
                    'url_Img_Display'=>$res["url_Img_Display"],
                    'ident'=>$res["ident"],
                    'precio'=>$res["precio"],
                    'veces_visitado'=>$res["veces_visitado"]);
}

echo json_encode($arr_nombres);
unset($arr_nombres);
unset($query);
unset($consulta);
mysqli_close($database);

?>