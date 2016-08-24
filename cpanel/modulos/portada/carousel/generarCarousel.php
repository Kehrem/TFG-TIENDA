<?php 
/*CREAMOS FICHERO*/
//
$carousel0='';
$carousel1='';
$carousel2='';
$carousel0='<div class="row carousel-holder">

                    <div class="'.$_POST["params"][2].' '.$_POST["params"][3].'">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">';


for($i=0;$i<$_POST["params"][0];$i++){
    $carousel1.= '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
    if($i==intval($_POST["params"][0])-1){
        //si es el último metemos el <ol>
        $carousel1.='</ol><div class="carousel-inner">';
    }
    
     $carousel1.= '<div class="item">
                                    <img class="slide-image" src="'.$_POST["params"][4][$i].'" alt="">
                                </div>';
}
                            
$carousel2='
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>';
$carouselPHP=$carousel0.$carousel1.$carousel2;
$myfile = fopen("../../../../modulos_portada/".$_POST["params"][1].".php", "w") or die("Unable to open file!");
fwrite($myfile, $carouselPHP);
fclose($myfile);
/*FIN FICHERO*/ 

//insertar el nuevo carousel en la base de datos para que cargue en main
$database=mysqli_connect("localhost","tfg_admin","","tfg");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="INSERT INTO elementosportada(nombre,url,activo) values ('".$_POST["params"][1]."','../modulos_portada/".$_POST["params"][1].".php',1)";

$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
          
}



?>