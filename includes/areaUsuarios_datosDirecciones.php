<div class="cold-md-12 lista_direcciones">
    <!--<span></span> -->
    <h4>MIS DIRECCIONES </h4>
    <span class='add_direccion'><a onclick="control_añadirDireccion()"><i class="fa fa-plus fa-3x" aria-hidden="true"></i></a></span>
    
</div>
<div class="col-md-12 display_none forms_añadir-actualizar-direccion">
    <div class="col-md-8 col-md-push-2">
        <form class="form form_editarDireccion" id="form_editarDireccion" onsubmit="control_comprobarEditarDireccion(event,this);">

            <h4>Editar Dirección</h4>
            <span class="form_label-input-container"><label>Nombre de la dirección: </label><input id="input_nombre" type="text" pattern="{3,15}" onchange="control_comprobarCampo(this);" onkeypress="control_compruebaKeyPress(event,this);" maxlength="15" onkeyup="control_compruebaKeyUp(event,this);" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i>
</span></span>
            <span class="form_label-input-container"><label>Código Postal: </label><input id="input_codigoPostal" type="text" pattern="[0-9]{5}" onkeypress="control_compruebaKeyPress(event,this);" onchange="control_comprobarCampo(this);" maxlength="5" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <!--<span class="form_label-input-container"><label>Provincia: </label><select onchange="control_cambioProvincia();" class="form_signUp-provincias"></select><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>-->
            <span class="form_label-input-container"><label>Localidad: </label><input type="text" id="input_localidad" onkeypress="control_compruebaKeyPress(event,this);" onkeyup="control_compruebaKeyUp(event,this);" class="form_signUp-localidad" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Dirección: </label><input type="text" onkeypress="control_compruebaKeyPress(event,this);" id="input_direccion" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Número de teléfono: </label><input id="input_telefono" onkeypress="control_compruebaKeyPress(event,this);" type="text" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <input type="submit" value="Actualizar dirección">
        </form>
    </div>
</div>
<script>

    //rellenar provincias
    //control_getProvincias();
    $("#input_codigoPostal").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_nombre").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_telefono").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_direccion").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_localidad").focusout(function(){
        control_comprobarCampo(this);
    });
    
</script>
<script>
$.ajax({
            url:"json/areaUsuarios_datosDirecciones.php",
            method:"POST",
            beforeSend: function(){
            control_popUpProcesando("abrir");
            },
            success: function(result){
                control_popUpProcesando("cerrar");
                   //parse JSON y send
                    var n = JSON.parse(result);
                $.each(n,function(key,value){
                    //var d=$(".lista_direcciones").append("<div id='direccion-"+key+"' class='direccion row'></div>");
                    $(".lista_direcciones").append("<div class='col-md-4 direccion contDir-"+key+"'></div>");
                    $(".contDir-"+key).append("<div class='contDir'></div>");
                    $(".contDir-"+key).find(".contDir").append("<h5>"+value[4]+"</h5>");
                    $(".contDir-"+key).find(".contDir").append("<p><span class='contDir_data'>Código Postal:</span><span class='contDir_value'>"+value[0]+"</span></p>");
                    $(".contDir-"+key).find(".contDir").append("<p><span class='contDir_data'>Localidad:</span> <span class='contDir_value'>"+value[1]+"</span></p>");
                    $(".contDir-"+key).find(".contDir").append("<p><span class='contDir_data'>Dirección:</span> <span class='contDir_value'>"+value[2]+"</span></p>");
                    $(".contDir-"+key).find(".contDir").append("<p><span class='contDir_data'>Teléfono:</span> <span class='contDir_value'>"+value[3]+"</span></p>");
                    $(".contDir-"+key).find(".contDir").append("<div class='contDir_opciones'></div>");
                    $(".contDir-"+key).find(".contDir").find(".contDir_opciones").append("<div class='contDir_opcion' onclick='control_editarDireccion("+key+")'><i class='fa fa-pencil-square-o fa-2x' aria-hidden='true'></i></div>");
                    $(".contDir-"+key).find(".contDir").find(".contDir_opciones").append("<div class='contDir_opcion' onclick='control_eliminarDireccion("+value[5]+")'><i class='fa fa-trash fa-2x' aria-hidden='true' ></i></div>");
                });
            }
        });

</script>