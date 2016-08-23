<?php 


$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_POST["categoria"]==-1){
    $consulta="SELECT admin_avisos.ident, admin_avisos.titulo, admin_avisos.descripcion, admin_avisos.leido, admin_avisos_categorias.nombre,admin_avisos.fecha FROM admin_avisos,admin_avisos_categorias where admin_avisos.categoria=admin_avisos_categorias.ident order by fecha desc";
}else{
    $consulta="SELECT admin_avisos.ident, admin_avisos.titulo, admin_avisos.descripcion, admin_avisos.leido, admin_avisos_categorias.nombre, admin_avisos.fecha FROM admin_avisos,admin_avisos_categorias where admin_avisos.categoria=admin_avisos_categorias.ident and admin_avisos_categorias.ident=".$_POST["categoria"]." order by fecha;";
}
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    if(mysqli_num_rows($query)>0){
        $array=array();
        while($res=mysqli_fetch_object($query)){
            
            $array[]=array("ident"=>$res->ident,
                                "nombre"=>utf8_encode($res->nombre),
                                "titulo"=>utf8_encode($res->titulo),
                                "descripcion"=>utf8_encode($res->descripcion),
                                "leido"=>$res->leido,
                                "fecha"=>$res->fecha);
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