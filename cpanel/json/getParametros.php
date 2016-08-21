<?php 

$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$consulta="SELECT parametros_kpis.ident,parametros_kpis.ident_kpi,parametros_kpis.tabla,parametros_kpis.param1,parametros_kpis.param2,graficas_kpis.nombre,graficas_kpis.descripcion FROM parametros_kpis,graficas_kpis where parametros_kpis.ident_kpi=".$_POST["elemento"]." and parametros_kpis.ident_kpi=graficas_kpis.ident;";
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
                                "tabla"=>utf8_encode($res->tabla),
                                "ident_kpi"=>$res->ident_kpi,
                                "param1"=>$res->param1,
                                "param2"=>$res->param2);
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