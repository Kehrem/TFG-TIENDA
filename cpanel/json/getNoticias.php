<?php 


$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="select * from noticias";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    if(mysqli_num_rows($query)>0){
        $array=array();
        while($res=mysqli_fetch_object($query)){
            
            $array[]=array("ident"=>$res->ident,
                                "nombre"=>utf8_encode($res->nombre),
                                "cuerpo"=>utf8_encode($res->cuerpo));
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