<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$consulta="SELECT raiz FROM categorias_productos where ident=".$_POST["categoria"].";";

$query=mysqli_query($database,$consulta);

if(!$query){
    die("Error en la query $consulta");
}else{
    $res=mysqli_fetch_object($query);
    $raiz=$res->raiz;
    if($raiz=="NULL" || $raiz==NULL){
         //si la raiz no es null cargo solo los de esa categoria concreta
        $consulta3="SELECT articulos.ident, articulos.nombre, articulos.precio, articulos.descripcion, articulos.url_Img, articulos.url_Img_Display, articulos.url_video, articulos.veces_visitado, articulos.disponibilidad, articulos.inventario FROM articulos where articulos.categoria in (Select ident from categorias_productos where raiz=".$_POST["categoria"].") ".$_POST["orden"].";";
        $query3=mysqli_query($database,$consulta3);
        if(!$query3){
            die("Error en la query $consulta3");
            
        }else{
            if(mysqli_num_rows($query3)>0){
                $arrArticulos=array();
                while($art=mysqli_fetch_object($query3)){
                    $query4="SELECT count(puntuacion) as numPuntuaciones, sum(puntuacion) as puntuacionTotal, count(comentario) as numComentarios from articulos_puntuaciones where ident_articulo=$art->ident";
                    $dataPuntuaciones=mysqli_query($database,$query4);
                    if(!$query4){
                        die("Error en la query $query4");
                    }
                    $resPuntuaciones=mysqli_fetch_object($dataPuntuaciones);
                    $numPuntuado=$resPuntuaciones->numPuntuaciones;
                    $puntTotal=$resPuntuaciones->puntuacionTotal;
                        if($puntTotal=="NULL" || $puntTotal==NULL){
                            $puntTotal=0;
                        }
                    $puntuacionFinal=0;
                    if($puntTotal!=0){
                        $puntuacionFinal=floatval($puntTotal/$numPuntuado);
                    }
                    $arrArticulos[]=array("nombre"=>utf8_encode($art->nombre),
                                         "descripcion"=>utf8_encode($art->descripcion),
                                         "url_Img"=>$art->url_Img,
                                         "url_Img_Display"=>$art->url_Img_Display,
                                         "url_video"=>$art->url_video,
                                         "ident"=>$art->ident,
                                         "precio"=>$art->precio,
                                         "veces_visitado"=>$art->veces_visitado,
                                          "disponibilidad"=>$art->disponibilidad,
                                          "inventario"=>$art->inventario,
                                          "puntuacion"=>$puntuacionFinal,
                                          "veces_puntuado"=>intval($numPuntuado),
                                         "numComentarios"=>intval($resPuntuaciones->numComentarios));
                }
                
                echo json_encode($arrArticulos);
            }else{
                echo "sin resultados";
            }
        }
    }else{
        //si la raiz no es null cargo solo los de esa categoria concreta
        $consulta3="SELECT articulos.ident, articulos.nombre, articulos.precio, articulos.descripcion, articulos.url_Img, articulos.url_Img_Display, articulos.url_video, articulos.veces_visitado, articulos.disponibilidad, articulos.inventario FROM articulos where articulos.categoria=".$_POST["categoria"]." ".$_POST["orden"].";";
        $query3=mysqli_query($database,$consulta3);
        if(!$query3){
            die("Error en la query $consulta3");
            
        }else{
            if(mysqli_num_rows($query3)>0){
                $arrArticulos=array();
                while($art=mysqli_fetch_object($query3)){
                    $query4="SELECT count(puntuacion) as numPuntuaciones, sum(puntuacion) as puntuacionTotal, count(comentario) as numComentarios from articulos_puntuaciones where ident_articulo=$art->ident";
                    $dataPuntuaciones=mysqli_query($database,$query4);
                    if(!$query4){
                        die("Error en la query $query4");
                    }
                    $resPuntuaciones=mysqli_fetch_object($dataPuntuaciones);
                    $numPuntuado=$resPuntuaciones->numPuntuaciones;
                    $puntTotal=$resPuntuaciones->puntuacionTotal;
                        if($puntTotal=="NULL" || $puntTotal==NULL){
                            $puntTotal=0;
                        }
                    $puntuacionFinal=0;
                    if($puntTotal!=0){
                        $puntuacionFinal=floatval($puntTotal/$numPuntuado);
                    }
                    $arrArticulos[]=array("nombre"=>utf8_encode($art->nombre),
                                         "descripcion"=>utf8_encode($art->descripcion),
                                         "url_Img"=>$art->url_Img,
                                         "url_Img_Display"=>$art->url_Img_Display,
                                          "url_video"=>$art->url_video,
                                         "ident"=>$art->ident,
                                         "precio"=>$art->precio,
                                         "veces_visitado"=>$art->veces_visitado,
                                          "disponibilidad"=>$art->disponibilidad,
                                          "inventario"=>$art->inventario,
                                          "puntuacion"=>$puntuacionFinal,
                                          "veces_puntuado"=>intval($numPuntuado),
                                         "numComentarios"=>intval($resPuntuaciones->numComentarios));
                }
                
                echo json_encode($arrArticulos);
            }else{
                echo "sin resultados";
            }  
        }
    }
}

unset($query);
unset($consulta);
unset($query2);
unset($consultaArticulos);
unset($query3);
unset($consulta3);
unset($arrArticulos);
unset($raiz);
unset($res);
mysqli_close($database);
unset($database);

?>