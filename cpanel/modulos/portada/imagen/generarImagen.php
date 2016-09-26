<?php 
/*CREAMOS FICHERO*/
//
$carousel0='';
$carousel1='';
$carousel2='';
$carouselPHP='';
$claseImagen='';
if($_POST["params"][6]=="false"){
    $claseImagen='.customImg{
        width:'.$_POST["params"][4][0].$_POST["params"][4][1].';
        height:'.$_POST["params"][5][0].$_POST["params"][5][1].';
        }';
}else{
     $claseImagen='.customImg{
        max-width:100%;
        width:100%;
        max-height:100%;
        height:100%;
        }';
}
if($_POST["params"][1]=="auto" && $_POST["params"][6]=="false"){
        
        $carouselPHP.='<div class="customRow '.$_POST["params"][2].'">
                        <div class="thumbnail">
                            <a href="#"><img class="customImg" src="'.$_POST["params"][3].'" alt=""></a>

                        </div>';
}else{

    $carouselPHP.='<div class="col-sm-'.$_POST["params"][1].' col-lg-'.$_POST["params"][1].' col-md-'.$_POST["params"][1].' '.$_POST["params"][2].'">
                        <div class="thumbnail">
                            <a href="#"><img class="customImg" src="'.$_POST["params"][3].'" alt=""></a>

                        </div>';
}
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

'.$claseImagen.'
.customRow{
width:'.$_POST["params"][4][0].$_POST["params"][4][1].';
height:'.$_POST["params"][5][0].$_POST["params"][5][1].';
}
</style>';
$myfile = fopen("../../../../modulos_portada/imagen-".$_POST["params"][0].".php", "w") or die("Unable to open file!");
fwrite($myfile, $carouselPHP);
fwrite($myfile, $style);
fclose($myfile);
/*FIN FICHERO*/ 

//insertar el nuevo carousel en la base de datos para que cargue en main
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="INSERT INTO elementosportada(nombre,url,activo) values ('imagen-".$_POST["params"][0]."','/TFG/tienda/modulos_portada/imagen-".$_POST["params"][0].".php',1)";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
          
}

echo "ok";

?>