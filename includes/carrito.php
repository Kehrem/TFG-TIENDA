<div class="col-md-12 opcionesProgresoCompra">
    <div class="col-md-12 row panelMenus_progresoCompra">
            <ul class="menusConfiguracion progresoCompra">
                <li class="menusConfiguracion_subMenu menuActivo" id="confirmar_cestaCompra">
                   Confirmar Cesta Compra
                </li>
                <li class="menusConfiguracion_subMenu" id="confirmar_cestaDireccion">
                     Confirmar Direccion
                </li>
                <li class="menusConfiguracion_subMenu" id="confirmar_cestaEnvio">
                     Forma de Envío
                </li>   
                <li class="menusConfiguracion_subMenu" id="confirmar_cestaPago">
                     Pagar
                </li>
            </ul>
        </div>    
</div>
<div class="col-md-12 panelDatos_progresoCompra">
    <?php session_start();
    if(isset($_SESSION["email"])){
        include("progresoCompraSession_cesta.php");
    }else{
        include("progresoCompraNoSession.php");
    }
    ?>
</div>

