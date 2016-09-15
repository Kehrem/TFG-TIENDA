<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$selectCategorias="Select * from categorias_productos where nombre like '%".$_POST["buscar"]."%' limit 2;";
$resultados=array();
$res=mysqli_query($database,$selectCategorias);
if(!$res){
    die("Error en la query $selectCategorias<br>");
}else{
    while($fila=mysqli_fetch_object($res)){
        $resultados[]=array("Categoria",utf8_encode($fila->nombre),$fila->ident);
    }
}
$limitArticulos=intval(5-intval(mysqli_num_rows($res)));
$selectArticulos="Select * from articulos where nombre like '%".$_POST["buscar"]."%' or descripcion like '%".$_POST["buscar"]."%' limit $limitArticulos;";
$res=mysqli_query($database,$selectArticulos);
if(!$res){
    die("Error en la query $selectArticulos<br>");
}else{
    while($fila=mysqli_fetch_object($res)){
        $resultados[]=array("Artículo",utf8_encode($fila->nombre),utf8_encode($fila->descripcion),$fila->ident,$fila->url_Img);
    }
}

echo json_encode($resultados);
mysqli_close($database);

?>