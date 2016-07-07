<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$consulta="SELECT * FROM articulos where categoria=".$_POST["categoria"]." order by veces_vendido desc limit 3 ";
$query=mysqli_query($database,$consulta);

$arr_nombres=array();
while($res=mysqli_fetch_array($query)){
    
$arr_nombres[]=array('nombre'=>utf8_encode($res["nombre"]),
                     'descripcion'=>$res["descripcion"],
                    'url_Img'=>$res["url_Img"],
                    'ident'=>$res["ident"],
                    'precio'=>$res["precio"],
                    'veces_visitado'=>$res["veces_visitado"],
                    'puntuacion'=>$res["puntuacion"],
                    'veces_puntuado'=>$res["veces_puntuado"]);
}

echo json_encode($arr_nombres);
unset($arr_nombres);
unset($query);
unset($consulta);
mysqli_close($database);

?>