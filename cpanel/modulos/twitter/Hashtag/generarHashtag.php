<?php 
/*CREAMOS FICHERO*/
//

$elemento='<div id="twitterHashtag-'.$_POST["params"][0].'"></div>';
$scriptSrc='<script src="https://platform.twitter.com/widgets.js"></script>';
$script1='<script>
window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));
';

$script2='twttr.widgets.createHashtagButton(
  "'$_POST["params"][1]'",
  document.getElementById("twitterHashtag-"'.$_POST["params"][0].'"),
  {
    size:"large"
  }
);*/*/
</script>';
$myfile = fopen("../../../../modulos_portada/twitterHashtag-".$_POST["params"][0].".php", "w") or die("Unable to open file!");
fwrite($myfile, $elemento);
fwrite($myfile, $scriptSrc.$script1.$script2);
fclose($myfile);
/*FIN FICHERO*/ 

//insertar el nuevo carousel en la base de datos para que cargue en main
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="INSERT INTO elementosportada(nombre,url,activo) values ('".$_POST["params"][0]."','../modulos_portada/twitterHashtag-".$_POST["params"][0].".php',1)";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
          
}

echo "ok";

?>