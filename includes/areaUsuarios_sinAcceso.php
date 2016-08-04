<div class="user_area_list">
    
    <div class="contenedor_compra">
        <a onclick="control_cargarDetallesCarrito();">
            <i class="carritoCompra fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="carritoCompra_info"></span>
            
        </a>
    </div> 
    <div class="contendor_opcionesUsuario">
        <span class="opcionesUsuario_a-group">
            <a class="opcionesUsuario" href="#" onclick="control_cargarLogIn();">Iniciar Sesión</a>
            <a class="opcionesUsuario" href="#" onclick="control_cargarRegistro();">Registrarse</a>
        </span>
    </div>            
</div>

<script>
    control_actualizarCarrito();
</script>