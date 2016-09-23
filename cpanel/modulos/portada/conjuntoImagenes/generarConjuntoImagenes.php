<?php 
/*CREAMOS FICHERO*/
//
$carousel0='';
$carousel1='';
$carousel2='';
$carouselPHP='<div class="row">';

for($i=0;$i<sizeof($_POST["params"]);$i++){
    if($i==0){
        //el 0 es el nombre
    }else{
        $carouselPHP.='<div class="col-sm-'.$_POST["params"][$i][0].' col-lg-'.$_POST["params"][$i][0].' col-md-'.$_POST["params"][$i][0].' '.$_POST["params"][$i][1].'">
                            <div class="thumbnail">
                                <a href="#"><img src="'.$_POST["params"][$i][2].'" alt=""></a>

                            </div></div>';
    }
}


$carouselPHP.='</div>';

$style='
<style>
img {
  vertical-align: middle;
}
.img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  width:100%;
  max-width: 100%;
  height: auto;
}
.img-rounded {
  border-radius: 6px;
}
.img-thumbnail {
  display: inline-block;
  max-width: 100%;
  height: auto;
  padding: 4px;
  line-height: 1.42857143;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  -webkit-transition: all .2s ease-in-out;
       -o-transition: all .2s ease-in-out;
          transition: all .2s ease-in-out;
}
.img-circle {
  border-radius: 50%;
}
</style>';
$myfile = fopen("../../../../modulos_portada/conjuntoImagenes-".$_POST["params"][0].".php", "w") or die("Unable to open file!");
fwrite($myfile, $carouselPHP);
fwrite($myfile, $style);
fclose($myfile);
/*FIN FICHERO*/ 

//insertar el nuevo carousel en la base de datos para que cargue en main
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="INSERT INTO elementosportada(nombre,url,activo) values ('conjuntoImagenes-".$_POST["params"][0]."','/TFG/tienda/modulos_portada/conjuntoImagenes-".$_POST["params"][0].".php',1)";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
          
}

echo "ok";

?>