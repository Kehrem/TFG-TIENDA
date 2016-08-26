<div class="col-md-12">
    <h1>Artículos</h1>
    <div class="col-md-12 row contProveedores">
        
        <div class="col-md-6 gestionProveedores">
            <h3 class="bigOne">Gestión Proveedores</h3>
            <form class="form" id="" action="" method="">
                <h4 class="bigOne">Nuevo Proveedor</h4>
                <span><label>Nombre:</label>
                    <input type="text" name="nombreProveedor"></span>
                <span><label>Email:</label>
                    <input type="text" name="emailProveedor"></span> 
                <span><label>Telefono:</label>
                    <input type="text" name="telefonoProveedor"></span>
                
                <input type="submit" value="Crear">
            </form>
            <form class="form" id="" action="" method="">
                <h4 class="bigOne">Actualizar Proveedor</h4>
                <span><label>Nombre:</label>
                    <input type="text" name="nombreProveedor"></span>
                <span><label>Email:</label>
                    <input type="text" name="emailProveedor"></span> 
                <span><label>Telefono:</label>
                    <input type="text" name="telefonoProveedor"></span>
                <input type="submit" value="Actualizar">
            </form>
             <form class="form" id="" action="" method="">
                <h4 class="bigOne">Asignar Artículo/Proveedor</h4>
                <span><label>Artículo:</label>
                    <input type="text" name=""></span>
                <span><label>Proveedor:</label>
                    <input type="text" name=""></span> 
                <input type="submit" value="Asignar">
            </form>
        </div>
        <div class="col-md-6 rowsProveedoresArticulos">
            <h3 class="bigOne">Listado de Proveedores</h3>   
            
        </div>
    </div>
</div>
<script>
gestion_rellenarProveedores();
</script>