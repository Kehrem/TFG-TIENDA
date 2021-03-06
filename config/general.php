<?php 

/* Textos informacion registro */

$info_registro_activado=array("titulo"=>"Su cuenta ha sido activada!","descripcion"=>"<br>Gracias por registrarse, usted ya puede acceder a su cuenta personal! A qué espera? Inicie sesión y usted podrá configurar sus datos personales y comprar en nuestro sistema! Para iniciar sesión puede usted hacer click sobre el menú que le mostramos en la parte superior de la pantalla o bien hacer click <strong><a href='login.php'>aquí!</a></strong><br><br><hp>O bien si  usted lo desea puede volver al  Inicio pinchando a continuación</p>");
$info_registro_yaactivado=array("titulo"=>"Cuenta ya activada","descripcion"=>"Esta cuenta ya ha sido activada. Si es la primera vez que intenta validar su cuenta, podría haberla activado alguien por usted. Póngase en contacto con nosotros.");
$info_registro_error=array("titulo"=>"Oups! Algo no fue como debiere!","descripcion"=>"Se ha producido algún error durante el proceso de alta de su cuenta de usuario, póngase en contacto con nosotros para solventar este problema. Gracias y disculpe las molestias");
$info_registro_caducado=array("titulo"=>"Enlace caducado","descripcion"=>"Este enlace de activación de cuenta ha caducado! Los enlaces de activación de cuenta solo están activos durante 24h. Si desea validar su cuenta puede usted solicitar otro enlace pinchando <a href='#'>aquí</a>");
$info_registro_completado=array("titulo"=>"Registro completado","descripcion"=>"El registro se ha completado de forma exitosa! Le hemos enviado un mail a la dirección proporcionada durante el registro para validar su cuenta. Por favor revise su correo. Si no ha recibido ningún mail en su bandeja principal asegurese de que no se encuentra en la bandeja de 'Spam' y pongase en contacto con nosotros! Muchas gracias!");
$info_registro= array("activado"=>$info_registro_activado,"completado"=>$info_registro_completado,"error"=>$info_registro_error,"ya activado"=>$info_registro_yaactivado,"caducado"=>$info_registro_caducado);




?>