<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
$consulta="SELECT articulos_puntuaciones.ident_usuario, articulos_puntuaciones.puntuacion, articulos_puntuaciones.fecha, articulos_puntuaciones.comentario, usuarios.nombre FROM articulos_puntuaciones,usuarios where articulos_puntuaciones.ident_articulo=".$_POST["ident"]." and usuarios.ident=articulos_puntuaciones.ident_usuario";

$query=mysqli_query($database,$consulta);
$array_puntuaciones=array();

if(!$query){
    die("Error en la query $query");
}else{
    if(mysqli_num_rows($query)>0){
        
        while($res=mysqli_fetch_array($query)){
    
        $array_puntuaciones[]=array('ident_usuario'=>$res["ident_usuario"],
                            'nombre'=>$res["nombre"],
                            'puntuacion'=>$res["puntuacion"],
                            'fecha'=>$res["fecha"],
                            'comentario'=>utf8_encode($res["comentario"])
                    );
        }
        echo json_encode($array_puntuaciones);

    }else{
        echo "sin reviews";
    }
    
}

unset($query);
unset($res);
unset($consulta);
unset($array_puntuaciones);
mysqli_close($database);

?>