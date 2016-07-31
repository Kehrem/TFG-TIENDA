<div class="col-md-12">
    <div class="col-md-12 row areaUsuarios_panelMenus">
        <ul class="menusConfiguracion">
            <li class="menusConfiguracion_subMenu config_datosPersonales menuActivo">
                <a onclick="control_cargarDatosUsuario(this,'areaUsuarios_datosPersonales.php');">Datos Personales</a>
            </li>
            <li class="menusConfiguracion_subMenu config_datosDirecciones">
                 <a onclick="control_cargarDatosUsuario(this,'areaUsuarios_datosDirecciones.php');">Datos Direcciones</a>
            </li>
            <li class="menusConfiguracion_subMenu config_datosPedidos">
                 <a onclick="control_cargarDatosUsuario(this,'areaUsuarios_datosPedidos.php');">Datos Pedidos</a>
            </li>   
            <li class="menusConfiguracion_subMenu config_datosOtros">
                 <a onclick="control_cargarDatosUsuario(this,'areaUsuarios_datosOtros.php');">Otros</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 col-md-push-1 row areaUsuarios_panelDatos">
       
    </div>

</div>

<script>control_cargarDatosUsuario($(".config_datosPersonales").children(0),"areaUsuarios_datosPersonales.php");</script>
