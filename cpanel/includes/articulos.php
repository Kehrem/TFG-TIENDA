<div class="col-md-12">
    <h1>Artículos</h1>
    <div class="col-md-12 row contArticulos">
        
        <div class="col-md-6 gestionArticulos">
            <h3 class="bigOne">Gestión Artículos</h3>
            <form class="form" id="" action="" method="">
                <h4 class="bigOne">Nuevo Artículo</h4>
                <span><label>Nombre:</label>
                    <input type="text" name="nombreNuevoArticulo"></span>
                <span><label>Precio:</label>
                    <input type="text" name="precioNuevoArticulo"></span> 
                <span><label>Categoria:</label>
                    <input type="text" name="categoriaNuevoArticulo"></span>
                <span><label>Url Imagen (Preview):</label>
                    <input type="text" name="urlImagenNuevoArticulo"></span>
                <span><label>Url Imagen (Display):</label>
                    <input type="text" name="urlImagenDisplayNuevoArticulo"></span>
                <span><label>Url Video:</label>
                    <input type="text" name="urlVideoNuevoArticulo"></span>
                <span><label>Categoria:</label>
                    <input type="text" name="urlImagenCategoria"></span>
                
                <input type="submit" value="Crear">
            </form>
            <form class="form" id="" action="" method="">
                <h4 class="bigOne">Actualizar Artículo</h4>
                <span><label>Nombre:</label>
                    <input type="text" name="nombreNuevoArticulo"></span>
                <span><label>Precio:</label>
                    <input type="text" name="precioNuevoArticulo"></span> 
                <span><label>Categoria:</label>
                    <input type="text" name="categoriaNuevoArticulo"></span>
                <span><label>Url Imagen (Preview):</label>
                    <input type="text" name="urlImagenNuevoArticulo"></span>
                <span><label>Url Imagen (Display):</label>
                    <input type="text" name="urlImagenDisplayNuevoArticulo"></span>
                <span><label>Url Video:</label>
                    <input type="text" name="urlVideoNuevoArticulo"></span>
                <span><label>Categoria:</label>
                    <input type="text" name="urlImagenCategoria"></span>
                <input type="submit" value="Actualizar">
            </form>
            <div class="col-md-12 gestionTablaArticulos">
                <h3 class="bigOne">Gestión Tabla Artículos</h3>
                <form class="form" id="" action="" method="">
                    <h4 class="bigOne">Añadir Campo</h4>
                    <span><label>Nombre:</label>
                        <input type="text" name=""></span>
                    <span><label>Tipo:</label>
                        <input type="text" name=""></span> 
                    <span><label>Valor por defecto:</label>
                        <input type="text" name=""></span>
                    <span><label>Nulo?</label>
                        <input type="checkbox" name=""></span>
                    <input type="submit" value="Actualizar">
                </form>
                <form class="form" id="" action="" method="">
                    <h4 class="bigOne">Editar Campo</h4>
                    <span><label>Nombre:</label>
                        <input type="text" name=""></span>
                    <span><label>Nuevo Tipo:</label>
                        <input type="text" name=""></span> 
                    <span><label>Nuevo Valor por defecto:</label>
                        <input type="text" name=""></span>
                    <span><label>Nulo?</label>
                        <input type="checkbox" name=""></span>
                    <input type="submit" value="Actualizar">
                </form>
            </div>
        </div>
        
        <div class="col-md-6 rowsArticulos">
            <h3 class="bigOne">Listado de Artículos</h3>   
            <div>
                <form class="search_form">
                         <i class="fa fa-search fa-lg fa-flip-horizontal" aria-hidden="true"></i> <input type=search id="search_input" name="search_input">

                    </form>
            </div>
        </div>
    </div>
</div>
<script>
gestion_rellenarArticulos();
</script>