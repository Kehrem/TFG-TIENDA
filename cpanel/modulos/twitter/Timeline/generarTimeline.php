<?php 
/*CREAMOS FICHERO*/
//
/*$div="<div id='twitterTimeLine-".$_POST["params"][0]."'></div>";
$elemento='<script>
    $("main").after().append("'.$div.'");
</script>';*/
$elemento='<div id="twitterTimeLine-'.$_POST["params"][0].'"></div>';
$script='<script>
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
}
(document, "script", "twitter-wjs"));


twttr.ready(function(){
    twttr.widgets.createTimeline({
      sourceType: "'.$_POST["params"][4].'",
      screenName: "'.$_POST["params"][1].'"
    },
    document.getElementById("twitterTimeLine-'.$_POST["params"][0].'"),
    {
      width: '.$_POST["params"][2].',
      height: '.$_POST["params"][3].',
      related: "'.$_POST["params"][1].'"
    }).then(function (el) {
    });
});
</script>';
$myfile = fopen("../../../../modulos_portada/twitterTimeLine-".$_POST["params"][0].".php", "w") or die("Unable to open file!");
fwrite($myfile, $elemento);
fwrite($myfile, $script);
fclose($myfile);
/*FIN FICHERO*/ 

//insertar el nuevo carousel en la base de datos para que cargue en main
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="INSERT INTO elementosportada(nombre,url,activo) values ('twitterTimeLine-".$_POST["params"][0]."','/TFG/tienda/modulos_portada/twitterTimeLine-".$_POST["params"][0].".php',1)";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
          
}

echo "ok";

?>