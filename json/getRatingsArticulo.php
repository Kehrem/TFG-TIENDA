<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
$consulta="SELECT articulos_puntuaciones.ident_usuario, articulos_puntuaciones.ident_articulo, articulos_puntuaciones.puntuacion, articulos_puntuaciones.fecha, articulos_puntuaciones.comentario, usuarios.username, usuarios.url_Img FROM articulos_puntuaciones,usuarios where articulos_puntuaciones.ident_articulo=".$_POST["ident"]." and usuarios.ident=articulos_puntuaciones.ident_usuario";

$query=mysqli_query($database,$consulta);
$array_puntuaciones=array();

while($res=mysqli_fetch_array($query)){
    
$array_puntuaciones[]=array('ident_articulo'=>$res["ident_articulo"],
                     'ident_usuario'=>$res["ident_usuario"],
                            'username'=>$res["username"],
                            'url_Img'=>$res["url_Img"],
                            'puntuacion'=>$res["puntuacion"],
                            'fecha'=>$res["fecha"],
                            'comentario'=>utf8_encode($res["comentario"])
                    );
}

$consulta="SELECT count(*) as num_puntuaciones, AVG(puntuacion) as puntuacion_media FROM articulos_puntuaciones where ident_articulo=".$_POST["ident"].";";

$query=mysqli_query($database,$consulta);

$res=mysqli_fetch_array($query);
$arr_extra = array('num_puntuaciones'=>$res["num_puntuaciones"],
                  'puntuacion_media'=>$res["puntuacion_media"]);


$array_out=array("puntuacion"=>$arr_extra,
                "reviews"=>$array_puntuaciones);
unset($query);
unset($consulta);
unset($array_puntuaciones);
echo json_encode($array_out);
unset($array_out);
mysqli_close($database);

?>