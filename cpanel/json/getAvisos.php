<?php 

$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="SELECT graficas_kpis.ident,graficas_kpis.nombre as nombre, graficas_kpis.descripcion, grupos_kpis.ident as ident_padre, grupos_kpis.nombre as padre FROM graficas_kpis
left join grupos_kpis on grupos_kpis.ident=graficas_kpis.padre;";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    if(mysqli_num_rows($query)>0){
        $array=array();
        while($res=mysqli_fetch_object($query)){
            
            $array[]=array("ident"=>$res->ident,
                                "nombre"=>utf8_encode($res->nombre),
                                "descripcion"=>utf8_encode($res->descripcion),
                                "ident_padre"=>$res->ident_padre,
                                "padre"=>utf8_encode($res->padre));
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