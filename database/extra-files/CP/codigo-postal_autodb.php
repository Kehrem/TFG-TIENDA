<?php
header("Content-Type: text/html;charset=utf-8");
ini_set('max_execution_time', 99999);

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
    if(((ord($param)>=48) && (ord($param)<=57))||((ord($param)>=97) && (ord($param)<=122))){
        if(ord($param)==120){
              $return="x";
        }else{
            $return="numero";    
        } 
        
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
                            "ciudad"=>substr($linea,3),
                            "provincia"=>substr($linea,0,2));
        }
        if($dev2=="numero"){
            //último digito dado que actualmente no hay más de 9 subdivisiones por ciudad importante y suponemos que aunque se modifiquen no habrán más de 99 nunca. Comprobación de seguridad
            $digito_codigo3=substr($linea,2,2);
            $ciudades_referencia[]=array("ident"=>$digitos_ident.$digito_codigo2,
                            "ciudad"=>substr($linea,4),
                            "provincia"=>substr($linea,0,2));
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
unset($linea);

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
unset($key);unset($val);
unset($creartablaProvincias);
unset($limpiarprovincias);


/*CIUDADES REFERENCIA*/

$limpiarcr="DROP TABLE IF EXISTS ciudades_referencia;";

echo "***** Limpiamos tabla ciudades_referencia *****<br><br>";

$res=mysqli_query($database,$limpiarcr);

if($res==true){
    echo $limpiarcr."-- success<br><br>";
}else{
     die('Consulta "'.$limpiarcr.'" FATAL ERROR<br> ');
}

echo "***** Creamos tabla ciudades_referencia *****<br><br>";

$creartablaCR="CREATE TABLE ciudades_referencia
(
ident varchar(4),
nombre varchar(30)
)DEFAULT CHARSET=utf8
DEFAULT COLLATE utf8_spanish_ci;

";

$res=mysqli_query($database,$creartablaCR);

if($res==true){
    echo $creartablaCR."-- success<br>";
}else{
     die('Consulta "'.$creartablaCR.'" FATAL EROR<br>');
}

$limpiarlocalidades="DROP TABLE IF EXISTS localidades;";

echo "***** Limpiamos tabla localidades *****<br><br>";

$res=mysqli_query($database,$limpiarlocalidades);

if($res==true){
    echo $limpiarlocalidades."-- success<br><br>";
}else{
     die('Consulta "'.$limpiarlocalidades.'" FATAL ERROR<br> ');
}



echo "***** Creamos tabla localidades *****<br><br>";

$creartablalocalidades="CREATE TABLE localidades
(
ident INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre varchar(150),
cp varchar(5),
ciudad_referencia varchar(4) NULL,
provincia varchar(2)
)DEFAULT CHARSET=utf8
DEFAULT COLLATE utf8_spanish_ci;

";

$res=mysqli_query($database,$creartablalocalidades);

if($res==true){
    echo $creartablalocalidades."-- success<br>";
}else{
     die('Consulta "'.$creartablalocalidades.'" FATAL EROR<br>');
}

echo "***** Rellenamos tabla ciudades_referencia *****<br><br>";

while (list($key, $val) = each($ciudades_referencia))
  {
    $identp=$val['ident'];
    $nombrep=$val['ciudad'];
    $csv=$nombrep;
    $prov=$val['provincia'];
    //$csv = iconv("UTF-8", "Windows-1252", $nombrep);
    $insert="INSERT INTO ciudades_referencia (ident,nombre) VALUES ('".$identp."','".utf8_decode($csv)."');";    $res=mysqli_query($database,$insert);

    if($res==true){
        echo $insert."-- success<br>";
    }else{
         die('Consulta "'.$insert.'" FATAL EROR '.mysqli_error($database).'<br>');
    }
    
    $fichero="codigos/".$val['ident']."codpos.txt";
    $stream = fopen($fichero, "r") or die("Fallo al abrir el fichero!");
    while($linea=fgets($stream,filesize($fichero))){
        
        $ln=explode(":",$linea);
        $cp=$ln[0];
        $ciudad=substr($ln[1],0,-2);//el substr -2  es para quitarle el \n\r que luego da problemas con las queries en el registro
        $replace=str_replace("'","`",$ciudad);
        $insert="INSERT INTO localidades (nombre,cp,ciudad_referencia,provincia) VALUES ('$replace','$cp','$identp','$prov');";
        $res=mysqli_query($database,$insert);

        if($res==true){
            echo $insert."-- success<br>";
        }else{
             die('Consulta "'.$insert.'" FATAL EROR '.mysqli_error($database).'<br>');
        }
    
    }
    fclose($stream);
    unset($ln);
    unset($cp);
    unset($ciudad);
    unset($insert);
    unset($res);
    unset($stream);
    unset($fichero);
    unset($key);
    unset($val);
    
  }


/*LOCALIDADES_PROVINCIAS (archivos NNx)*/ 
echo (sizeof($provincias));

  for($mm=0;$mm<sizeof($provincias);$mm++){//list($key,$val) = each($provincias)){
    $identp=$provincias[$mm]['ident']."x";
    echo $identp."<br>";
    $fichero="codigos/".$identp."codpos.txt";
    $stream = fopen($fichero, "r") or die("Fallo al abrir el fichero!");
    while($linea=fgets($stream,filesize($fichero))){
        
        $ln=explode(":",$linea);
        $cp=$ln[0];
        $ciudad=substr($ln[1],0,-2);
        $replace=str_replace("'","`",$ciudad);
        $insert="INSERT INTO localidades (nombre,cp,ciudad_referencia,provincia) VALUES ('$replace','$cp','NULL','$identp');";
        echo $insert."<br>";
        $res=mysqli_query($database,$insert);

        if($res==true){
            echo $insert."-- success<br>";
        }else{
             die('Consulta "'.$insert.'" FATAL EROR '.mysqli_error($database).'<br>');
        }
    
    }
    fclose($stream);
    unset($ln);
    unset($cp);
    unset($ciudad);
    unset($insert);
    unset($res);
    unset($stream);
    unset($fichero);
    unset($key);
    unset($val);
    
}


echo "**********************************************************************";
echo "**********************************************************************";
echo "**********************************************************************";
echo "*********************PROCESO FINALIZADO CON ÉXITO*********************";


mysqli_close($database);

/*Creamos ahora la tabla ciudades referencia*/




?>
