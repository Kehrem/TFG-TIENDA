<?php session_start();?>
<div class="user_area_list">
    
    <div class="contenedor_compra">
        <a href="pedido.php" onclick="">
            <i class="carritoCompra fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="carritoCompra_info"></span>
            
        </a>
    </div> 
    <div class="contendor_opcionesUsuario">
        <span class="opcionesUsuario_a-group">
            <span class="msg_bienvenida">Bienvenido <span><?php echo $_SESSION["acceso"];?></span></span>
        <a class="opcionesUsuario" href="areausuario.php" onclick="">Mi Cuenta</a>
        <a class="opcionesUsuario" href="#" onclick="control_logOut();">Salir</a>
        </span>
    </div>            
</div>

<script>

    control_actualizarCarrito();
</script>