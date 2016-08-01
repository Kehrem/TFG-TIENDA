<?php 

session_start();
$database=mysqli_connect("localhost","tfg_admin","","tfg");

//comprobamos los datos
$query="SELECT * from usuarios where email='".$_POST["data"][0]."' and password='".md5($_POST["data"][1])."'";

$end="";

$res=mysqli_query($database,$query);

if(!$res){
    die("Fatal error in query: '$query' <br>");   
}else{
   
    if(mysqli_num_rows($res)>0){
     
        //ACCESS GRANTED -- Acceso confirmado
        $end="ok";   
        $datos=mysqli_fetch_object($res);
        $_SESSION["acceso"]=$datos->nombre." ".$datos->apellidos;
        $_SESSION["email"]=$datos->email;
        //datos usuario

    }else{
        //comprobamos que el usuario validó su cuenta o si acaso existe
        $query="SELECT validado from usuarios_temp where email='".$_POST["data"][0]."'";
        $res=mysqli_query($database,$query);
        if(!$res){
            die("Fatal error in query: '$query'<br>");   
        }else{
            if(mysqli_num_rows($res)>0){
                
                $fila=mysqli_fetch_object($res);
                if($fila->validado==1){
                    //el usuario validó su cuenta y simplemente se ha equivocado con los datos                
                    $end="error datos";
                }else{
                    //el usuario no validó su cuenta
                    $end="no validado";
                }
            }else{
                //no encuentra el mail así que el nombre de usuario no existe
                $end="mail no existe";
            }
        }
    }
}

echo $end;
mysqli_close($database);

?>