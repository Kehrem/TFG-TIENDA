<?php session_start();?>
<div class="user_area_list">
    
    <div class="contenedor_compra">
        <a onmouseover="">
            <i class="carritoCompra fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="carritoCompra_info"></span>
        </a>
    </div> 
    <div class="contendor_opcionesUsuario">
        <span class="opcionesUsuario_a-group">
            <span class="msg_bienvenida">Bienvenido <span><?php echo $_SESSION["acceso"];?></span></span>
        <a class="opcionesUsuario" href="#" onclick="control_cargarAreaUsuario();">Mi Cuenta</a>
        <a class="opcionesUsuario" href="#" onclick="control_logOut();">Salir</a>
        </span>
    </div>            
</div>

<script>
    localStorage.clear();
    if(localStorage.getItem("carrito")){
        //$(".contendor_compra").append();
        
    }else{
        $(".carritoCompra_info").append("0 items. 0.00€");
    }
</script>