<div class="col-md-12 contBusquedaAvanzada">
    <h2>Búsqueda por filtro</h2>
    <div class="col-md-3">
        
        <form id="form_busquedaAvanzada">
            <div clas="col-md-12"><h4>Categoría</h4><select><option>Todas</option></select></div>
            <hr>
            <div clas="col-md-12"><h4>Nombre / Descripcion:</h4><input type=text></div>
            <hr>
            <div clas="col-md-12">
                <h4>Precio</h4>
                <div class="col-md-4">Desde:&nbsp;</div><div class="col-md-8"><input type="number" min="0" step="1"/><br></div>
                <div class="col-md-4">Hasta:&nbsp;</div><div class="col-md-8"><input type="number" min="0" step="1"/></div>
            </div>
            <hr>
            
            <input type=submit value="Buscar">
        </form>
    </div>
    <div class="col-md-9" id="contResultadosBusquedaAvanzada">
        <h3>Resultados Búsqueda</h3>
        <div class="col-md-12" id="resultadosBusquedaAvanzada">
        
        </div>
        
        
    </div>
</div>
<script>
funciones_rellenarCamposBA();
</script>