<?php 

$database=mysqli_connect("localhost","tfgcpanel_admin","","tfgadmin_admin");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$consulta="SELECT * FROM admins where nombreUsuario='".$_POST["username"]."' and pwd='".md5($_POST["pwd"])."'";
$query=mysqli_query($database,$consulta);
if(!$query){
    die ("Error en la query $consulta");
}else{
    if(mysqli_num_rows($query)>0){
        $res=mysqli_fetch_object($query);
        session_start();
        $_SESSION["admin"]=$res->nombreUsuario;
        header("Location: ../cpanel.php");
    }else{
        echo "<script>
        alert('Usuario o contraseña incorrectos');
        location.href='../index.php';
        </script>";
    }
}

mysqli_close($database);
?>