<?php
header("Content-Type: text/html;charset=utf-8");

/*Gracias a http://www.codigospostales.com/descarga.html*/

/*****Provincias*****/

$fichero="codigos/codciu.txt";
$stream = fopen($fichero, "r") or die("Fallo al abrir el fichero!");
$contenido="";
$provincias=array();
$ciudades_referencia=array();
function siguienteDigito($param){
    
    //$param=$digito_codigo
    
    $return="";
    if(ord($param)==120){
              $return="x";
    }
    if((ord($param)>=48) && (ord($param)<=57)){
            $return="numero";
    }
    if(((ord($param)>=65) && (ord($param)<=90)) || (ord($param)==195)){
            $return="comienzo";
    }
    return $return;
    
    
}
    
while($linea=fgets($stream,filesize($fichero))){
 
    //$contenido.=$linea."<br>";
    $digitos_ident=substr($linea,0,2);
    $digito_codigo=substr($linea,2,1);
    $dev=siguienteDigito($digito_codigo);
    if($dev=="x"){
        //provincia->metemos en el array que irá a la tabla de provincias
        $provincias[]=array("ident"=>$digitos_ident,
                            "provincia"=>substr($linea,3));
    }
    if($dev=="numero"){
     
        $digito_codigo2=utf8_encode(substr($linea,3,1));
        $dev2=siguienteDigito($digito_codigo2);
        
        if($dev2=="comienzo"){
            //ciudades referencia
            $ciudades_referencia[]=array("ident"=>$digitos_ident.$digito_codigo,
                            "ciudad"=>utf8_encode(substr($linea,3)));
        }
        if($dev2=="numero"){
            //último digito dado que actualmente no hay más de 9 subdivisiones por ciudad importante y suponemos que aunque se modifiquen no habrán más de 99 nunca. Comprobación de seguridad
            $digito_codigo3=substr($linea,2,2);
            $ciudades_referencia[]=array("ident"=>$digitos_ident.$digito_codigo3,
                            "ciudad"=>utf8_encode(substr($linea,4)));
        }
        
    }   
   
    
}
fclose($stream);
unset($digitos_ident);
unset($digito_codigo);
unset($dev);
unset($digito_codigo2);
unset($digito_codigo3);
unset($dev2);

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$limpiarprovincias="DROP TABLE IF EXISTS provincias;";

echo "***** Limpiamos tabla provincias *****<br><br>";

$res=mysqli_query($database,$limpiarprovincias);

if($res==true){
    echo $limpiarprovincias."-- success<br><br>";
}else{
     die('Consulta "'.$limpiarprovincias.'" FATAL ERROR<br> ');
}

echo "***** Creamos tabla provincias *****<br><br>";

$creartablaProvincias="CREATE TABLE provincias
(
ident varchar(2),
nombre varchar(30)
)DEFAULT CHARSET=utf8
DEFAULT COLLATE utf8_spanish_ci;

";

$res=mysqli_query($database,$creartablaProvincias);

if($res==true){
    echo $creartablaProvincias."-- success<br>";
}else{
     die('Consulta "'.$creartablaProvincias.'" FATAL EROR<br>');
}

echo "***** Rellenamos tabla provincias *****<br><br>";

while (list($key, $val) = each($provincias))
  {
    $identp=$val['ident'];
    $nombrep=$val['provincia'];
    $csv = iconv("UTF-8", "Windows-1252", $nombrep);
    $insert="INSERT INTO provincias (ident,nombre) VALUES ('".$identp."','".$csv."')";
    $res=mysqli_query($database,$insert);

    if($res==true){
        echo $insert."-- success<br>";
    }else{
         die('Consulta "'.$insert.'" FATAL EROR<br>');
    }
  }


unset($res);
unset($provincias);
unset($key);unset($val);
unset($database);
unset($creartablaProvincias);
unset($limpiarprovincias);


/*CIUDADES REFERENCIA*/

$limpiarcr="DROP TABLE IF EXISTS ciudades_referencia;";

echo "***** Limpiamos tabla provincias *****<br><br>";

$res=mysqli_query($database,$limpiarprovincias);

if($res==true){
    echo $limpiarprovincias."-- success<br><br>";
}else{
     die('Consulta "'.$limpiarprovincias.'" FATAL ERROR<br> ');
}

echo "***** Creamos tabla provincias *****<br><br>";

$creartablaProvincias="CREATE TABLE provincias
(
ident varchar(2),
nombre varchar(30)
)DEFAULT CHARSET=utf8
DEFAULT COLLATE utf8_spanish_ci;

";

$res=mysqli_query($database,$creartablaProvincias);

if($res==true){
    echo $creartablaProvincias."-- success<br>";
}else{
     die('Consulta "'.$creartablaProvincias.'" FATAL EROR<br>');
}

echo "***** Rellenamos tabla provincias *****<br><br>";

mysqli_close($database);




?>
