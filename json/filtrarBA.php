<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

if($_POST["datos"][0]=="-1"){
    $categoria="";
}else{
    
    $subcategorias="Select * from categorias_productos where raiz=".$_POST["datos"][0];
    $query0=mysqli_query($database,$subcategorias);
    $sc=array();
    if(mysqli_num_rows($query0)>0){
        //es raíz
        while($res0=mysqli_fetch_object($query0)){
            $sc[]=$res0->ident;
        }
    
        $categoria="categoria in (".implode(",",$sc).") and ";
    }else{
        $categoria="categoria=".$_POST["datos"][0]." and ";    
    }    
}
$nd="(nombre like '%".$_POST["datos"][1]."%' or descripcion like '%".$_POST["datos"][1]."%')";
$preciomin="precio>=".intval($_POST["datos"][2]);
if($_POST["datos"][3]=="" || $_POST["datos"][3]==" "){
    $preciomax="";
}else{
    $preciomax="and precio<=".intval($_POST["datos"][3]);
}

$consulta="SELECT * FROM articulos where $categoria $nd and $preciomin $preciomax";
//echo $consulta;
$query=mysqli_query($database,$consulta);

    //si la raiz no es null cargo solo los de esa categoria concreta
        
        if(!$query){
            die("Error en la query $consulta");
            
        }else{
            if(mysqli_num_rows($query)>0){
                $arrArticulos=array();
                while($art=mysqli_fetch_object($query)){
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
unset($query);
unset($consulta);
unset($consultaArticulos);
unset($arrArticulos);
unset($raiz);
unset($res);
mysqli_close($database);
unset($database);

?>