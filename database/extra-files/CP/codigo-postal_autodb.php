<?php

/*Gracias a http://www.codigospostales.com/descarga.html*/

/*****Provincias*****/

$fichero="codigos/codciu.txt";
$stream = fopen($fichero, "r") or die("Fallo al abrir el fichero!");
$contenido="";
$provincias=array();
function siguienteDigito($param){
    
    //$param=$digito_codigo
    $return="";
    if(ord($param)==120){
              $return="x";
    }
    if((ord($param)>=48) && (ord($param)<=57)){
            $return="numero";
    }
    if((ord($param)>=65) && (ord($param)<=90)){
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
     
        while($dev
        
    }
   
    
}
fclose($stream);
echo($contenido);
//parseamos contenido







?>