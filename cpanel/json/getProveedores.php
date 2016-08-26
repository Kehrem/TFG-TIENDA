<?php 


$database=mysqli_connect("localhost","tfg_admin","","tfg");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="select proveedores.nombre,proveedores.email,proveedores.telefono,articulos.nombre as articulo,articulos_proveedores.ident_proveedor,articulos_proveedores.ident_articulo from proveedores,articulos_proveedores,articulos where proveedores.ident=articulos_proveedores.ident_proveedor and articulos.ident=articulos_proveedores.ident_articulo order by articulos_proveedores.ident_proveedor asc";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    if(mysqli_num_rows($query)>0){
        $array=array();
        while($res=mysqli_fetch_object($query)){
            
            $array[]=array("nombre"=>utf8_encode($res->nombre),
                                "telefono"=>$res->telefono,
                                "email"=>$res->email,
                                "ident_articulo"=>$res->ident_articulo,
                                "articulo"=>$res->articulo,
                                "ident_proveedor"=>$res->ident_proveedor);    
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