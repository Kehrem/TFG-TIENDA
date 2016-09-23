<div class="col-md-12 contBusquedaAvanzada">
    <h2>Búsqueda por filtro</h2>
    
    <div class="col-md-3">
        
        <form id="form_busquedaAvanzada">
            <div clas="col-md-12"><h4>Categoría</h4><select id="categoriasBA"><option value="-1">Todas</option></select></div>
            <hr>
            <div clas="col-md-12"><h4>Nombre / Descripcion:</h4><input type=text id="ndBA"></div>
            <hr>
            <div clas="col-md-12">
                <h4>Precio</h4>
                <div class="col-md-4">Desde:&nbsp;</div><div class="col-md-8"><input type="number" min="0" step="1" id="BAprecioDesde" value="0"/><br></div>
                <div class="col-md-4">Hasta:&nbsp;</div><div class="col-md-8"><input type="number" min="0" step="1" id="BAprecioHasta"/></div>
            </div>
            <hr>
            
            <input type=submit value="Buscar">
        </form>
    </div>
    <div class="col-md-9" id="contResultadosBusquedaAvanzada">
        <h3>Resultados Búsqueda <span id="numResultadosBA"></span></h3>
        <div class="col-md-12" id="resultadosBA">
        <h4>Use el panel de la derecha para filtrar el resultado de las búsquedas</h4>
        </div>
        
        
    </div>
</div>
<script>
funciones_rellenarCamposBA();
    $("#form_busquedaAvanzada").submit(function(event){
       event.preventDefault();
        funciones_filtrarBA();
    });
    $("#categoriasBA").change(function(){funciones_filtrarBA()});
    $("#ndBA").keyup(function(){funciones_filtrarBA()});
    $("#BAprecioDesde").change(function(){funciones_filtrarBA()});
    $("#BAprecioHasta").change(function(){funciones_filtrarBA()});
//   $(".container").css("position","relative"); 
//   $(".stayAtBottom").css("position","relative"); 
</script>