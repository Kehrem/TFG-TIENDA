<div class="col-md-8 col-md-push-2">
        <form class="form form_nuevoKpi" id="form_nuevoKpi" onsubmit="gestion_nuevoKpi(event,this);">

            <h4>Nuevo Kpi</h4>
            <span class="form_label-input-container"><label>Nombre: </label><input id="input_nombre" type="text" pattern="[a-zA-Z][a-zA-Z ]{3,}" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i>
</span></span>
            <span class="form_label-input-container"><label>Tabla: </label><select id="tablas" ></select></span>
            <span class="form_label-input-container"><label>Parámetro X: </label><select id="paramX"></select></span>
            <span class="form_label-input-container"><label>Parámetro Y: </label><select id="paramY"></select></span>
            <input type="submit" value="Añadir Kpi">
        </form>
</div>
<script>
$.ajax({
        url:"json/getTablas.php",
        method:"POST",
        success: function(result){
            if(result!="sin resultados"){
                var n=JSON.parse(result);
                $.each(n,function(key,value){
                    $("#tablas").append("<option value='"+value+"'>"+value+"</option>");  
                });
                gestion_cargarParametrosTabla($("#tablas").val());
            }
        }
    });
</script>
<script>
    $("#tablas").change(function(){
       gestion_cargarParametrosTabla($("#tablas").val());
    });
</script>