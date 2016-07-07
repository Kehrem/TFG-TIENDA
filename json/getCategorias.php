<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$consulta="SELECT * FROM categorias_productos;";

$query=mysqli_query($database,$consulta);

$n="";
$arr_nombres=array();
while($res=mysqli_fetch_array($query)){
    
$arr_nombres[]=array('nombre'=>utf8_encode($res["nombre"]),
                     'raiz'=>$res["raiz"],
                    'url_Img'=>$res["url_Img"],
                    'ident'=>$res["ident"]);
}

echo json_encode($arr_nombres);
unset($arr_nombres);
unset($query);
unset($consulta);
mysqli_close($database);

?>