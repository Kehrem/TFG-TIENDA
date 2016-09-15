<?php 
session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");

    $query="SELECT * FROM elementosportada where activo=1 ORDER BY orden";
    $res=mysqli_query($database,$query);
$array=array();
$includes="<?php ";
    if(!$res){
        echo ("error");
        die("Error en la query $query");
    }else{
        if(mysqli_num_rows($res)>0){
            while($cnt=mysqli_fetch_object($res)){
                $array[]=array("ident"=>$cnt->ident,
                              "nombre"=>$cnt->nombre,
                              "url"=>$cnt->url);
                $includes.="include('$cnt->url');";
            }
            echo json_encode($array);
        }else{
            
        }
        
    }
$includes.="?>";
/*$myfile = fopen("../includes/index_main2.php", "w") or die("Unable to open file!");
fwrite($myfile, $includes);
fclose($myfile);*/
?>