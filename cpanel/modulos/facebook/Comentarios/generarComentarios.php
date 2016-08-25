<?php

$elemento='<div class="fb-comments" id="fbComentarios-'.$_POST["params"][0].'" data-href="'.$_POST["params"][1].'" data-numposts="5"></div>';

$script='<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7&appId=1320703614625933";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>';

$myfile = fopen("../../../../modulos_portada/fbComentarios-".$_POST["params"][0].".php", "w") or die("Unable to open file!");
fwrite($myfile, $elemento);
fwrite($myfile, $script);
fclose($myfile);
/*FIN FICHERO*/ 

//insertar el nuevo carousel en la base de datos para que cargue en main
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="INSERT INTO elementosportada(nombre,url,activo) values ('fbComentarios-".$_POST["params"][0]."','/TFG/tienda/modulos_portada/fbComentarios-".$_POST["params"][0].".php',1)";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
          
}

echo "ok";



?>