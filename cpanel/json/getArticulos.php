<?php 


$database=mysqli_connect("localhost","tfg_admin","","tfg");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="select * from articulos";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    if(mysqli_num_rows($query)>0){
        $array=array();
        while($res=mysqli_fetch_object($query)){
            
            $array[]=array("ident"=>$res->ident,
                                "nombre"=>utf8_encode($res->nombre),
                                "precio"=>$res->precio,
                                "descripcion"=>utf8_encode($res->descripcion),
                                "url_Img"=>$res->url_Img,
                                "url_Img_Display"=>$res->url_Img_Display,
                                "url_video"=>$res->url_video,
                                "categoria"=>$res->categoria,
                                "veces_visitado"=>$res->veces_visitado,
                                "veces_vendido"=>$res->veces_vendido,
                                "puntuacion"=>$res->puntuacion,
                                "veces_puntuado"=>$res->veces_puntuado);    
        }
    
            echo json_encode($array);
            unset($array);
            unset($query);
            unset($consulta);
    }else{
        echo "sin resultados";
    }
}

mysqli_close($database);
    

?>