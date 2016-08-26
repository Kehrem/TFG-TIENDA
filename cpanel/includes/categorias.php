<div class="col-md-12">
    <h1>Categorías</h1>
    <div class="col-md-12 row contCategorias">
        
        <div class="col-md-6 gestionCategorias">
            <h3 class="bigOne">Gestión Categoría</h3>
            <form class="form" id="" action="" method="">
                <h4 class="bigOne">Nueva Categoría</h4>
                <span><label>Nombre:</label>
                    <input type="text" name="nombreCategoria"></span>
                <span><label>Raiz:</label>
                    <input type="text" name="raizCategoria"></span>
                <span><label>Url_Imagen:</label>
                    <input type="text" name="urlImagenCategoria"></span>
                <input type="submit" value="Crear">
            </form>
            <form class="form" id="" action="" method="">
                <h4 class="bigOne">Actualizar Categoría</h4>
                <span><label>Nombre:</label>
                    <input type="text" name="nombreCategoria"></span>
                <span><label>Raiz:</label>
                    <input type="text" name="raizCategoria"></span>
                <span><label>Url_Imagen:</label>
                    <input type="text" name="urlImagenCategoria"></span>
                <input type="submit" value="Actualizar">
            </form>
        </div>
        <div class="col-md-6 rowsCategorias">
            <h3 class="bigOne">Listado de Categorías</h3>   
        </div>
    </div>
</div>
<script>
gestion_rellenarCategorias();
</script>