<?php 

session_start();

$database=mysqli_connect("localhost","tfg_admin","","tfg");

//El codigo de verificación lo haremos en base a una serie de caracteres generados aleatoriamente unidos al email codificado en md5. Dado que el email siempre será diferente esto nos asegura que el código generado siempre será diferente también.

//El array de posibles caracteres para el código es el siguiente:

$caracteres="abcdefgijklmnopqrstuvxyz01234567890._!()?";
$ret="";
for($it=0;$it<11;$it++){
    
    $ret.=$caracteres[rand(0,strlen($caracteres)-1)];
    
}

$ret.=md5($_POST["data"][2]);
    
$fecha=date("Y-m-d");
$csv = iconv("UTF-8", "Windows-1252", $_POST["data"][8]);
$consulta="INSERT INTO usuarios_temp (codigo_verificacion,email,password,nombre,apellidos,codigo_postal,localidad,direccion,telefono,validado,fecha_envio_verificacion) VALUES ('".$ret."','".$_POST["data"][2]."','".md5($_POST["data"][4])."','".$_POST["data"][0]."','".$_POST["data"][1]."',".$_POST["data"][6].",'".$_POST["data"][7]."','".$csv."','".$_POST["data"][9]."',0,'".$fecha."');";

$query=mysqli_query($database,$consulta);

if($query==true){
    //$ret="ok";
    }else{
        $_SESSION["registro"]="error";
         die('Consulta "'.$query.'" FATAL EROR '.mysqli_error($database).'<br>');
    }

unset($query);
unset($consulta);
mysqli_close($database);
unset($database);


/*MAIL*/

require '../requires/PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'energiapenolite.general@gmail.com';                 // SMTP username
$mail->Password = 'EnergiaPenolite';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('energiapenolite.general@gmail.com', 'EnergiaPenolite');
$mail->addAddress($_POST["data"][2]);     // Add a recipient // Name is optional
$mail->addReplyTo('energiapenolite.general@gmail.com', 'EnergiaPenolite');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Bienvenido a Energia Penolite!';
$mail->Body    = '<h2>Bienvenido a EP!</h2> <h3>Le agradecemos enormemente su confianza!</h3><h3>Si desea activar su cuenta pinche <a href="localhost/TFG/tienda/json/activarCuentaUsuario.php?c='.$ret.'">aqui</a></b></h3>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
$_SESSION["registro"]="completado";

?>