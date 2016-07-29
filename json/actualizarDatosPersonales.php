<?php 

$database=mysqli_connect("localhost","tfg_admin","","tfg");
 $cambioEmail="";
$cambioPwd="";
$emailActual="";
$pwdActual="";
$ret="";
for ($i=0;$i<sizeof($_POST["data"]);$i++){
    
    if($_POST["data"][$i][0]=="input_cambiarEmail"){
        $cambioEmail=$_POST["data"][$i][1];
    }
    if($_POST["data"][$i][0]=="input_cambiarContrasenya"){
        $cambioPwd=$_POST["data"][$i][1];
    }
    if($_POST["data"][$i][0]=="emailActual"){
        $emailActual=$_POST["data"][$i][1];
    }
    if($_POST["data"][$i][0]=="input_confirmarCambiarDatos"){
        $pwdActual=$_POST["data"][$i][1];
    }
   
}

if( $cambioEmail=="" && $cambioPwd==""){
    //no cambiamos nada;
    
}else{
    
    $query="SELECT * from usuarios where email='$emailActual' and password='$pwdActual'";
    $res=mysqli_query($database,$query);
    if(!$res){
        die("Error en la query: $query<br>");
    }else{
        if(mysqli_num_rows($res)>0){
            $ret="de momento voy bien";
            if( $cambioEmail!="" && $cambioPwd!=""){
                //cambiamos el email y la pwd;

            }

            if( $cambioEmail!="" && $cambioPwd==""){
                //cambiamos el email;

            }

            if( $cambioEmail=="" && $cambioPwd!=""){
                //cambiamos el pwd;

            }
        }else{
            $ret="Contraseña incorrecta!";
        }
    }
}
  

//0

?>