<?php 
session_start();
$c=$_GET["c"];

$database=mysqli_connect("localhost","tfg_admin","","tfg");

$select= "SELECT * FROM usuarios_temp where codigo_verificacion='$c';";

$query=mysqli_query($database,$select);

if($query==true){
    if(mysqli_num_rows($query)>0){
        $res=mysqli_fetch_object($query);
        $fecha=[date("Y"),date("m"),date("d")];
        $fechaenvio=explode("-",$res->fecha_envio_verificacion);
        
        //comprobamos fecha si han pasado más de 24h el enlace ya no será válido
        $diast=intval($fecha[2])-intval($fechaenvio[2]);
        if($diast>2){
            //enlace caducado o cuenta ya validada
                $_SESSION["registro"]="caducado";
                
        }else{
            
            if($res->validado==1){
                $_SESSION["registro"]="ya_activado";  
            }else{
                //proseguimos y validamos la cuenta
                $update="UPDATE usuarios_temp SET validado=1, fecha_validacion_verificacion='".date("Y-m-d")."';";
                $query2=mysqli_query($database,$update);
                if($query2){

                }else{
                    $_SESSION["registro"]="error";
                      die('Consulta "'.$query2.'" FATAL EROR '.mysqli_error($database).'<br>');   
                }
                $insert_usuarios="INSERT into usuarios (ident,email,password,nombre,apellido) VALUES ($res->ident,'".$res->email."','".$res->password."','".$res->nombre."','".$res->apellidos."');";
                $insert_facturacion="INSERT INTO usuarios_facturacion (ident_usuario,codigo_postal,localidad,direccion,telefono) VALUES ($res->ident,'".$res->codigo_postal."','".$res->localidad."','".$res->direccion."',$res->telefono)";
                $query3=mysqli_query($database,$insert_usuarios);
                if(!$query3){
                    $_SESSION["registro"]="error";
                     die('Consulta "'.$query3.'" FATAL EROR '.mysqli_error($database).'<br>');
                }
                $query4=mysqli_query($database,$insert_facturacion);
                if(!$query4){
                    $_SESSION["registro"]="error";
                     die('Consulta "'.$query4.'" FATAL EROR '.mysqli_error($database).'<br>');
                }
              $_SESSION["registro"]="activado";   
            }
        }
    }
}else{
    $_SESSION["registro"]="error";
    die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
}

echo '<script> window.location="../index.php";</script>';
    


?>