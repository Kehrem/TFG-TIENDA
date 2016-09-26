<div class="col-md-8 col-md-push-2">
        <form class="form form_addDireccion" id="form_addDireccion" onsubmit="control_comprobarAddDireccion(event,this);">

            <h4>Añadir Dirección</h4>
            <span class='cerrar_formDirecciones'><a onclick="control_cerrar('formDirecciones')"><i class="fa fa-times fa-3x" aria-hidden="true"></i></a></span>
            <span class="form_label-input-container"><label>Nombre de la dirección: </label><input id="input_nombre" type="text" onchange="control_comprobarCampo(this);" onkeypress="control_compruebaKeyPress(event,this);" maxlength="15" onkeyup="control_compruebaKeyUp(event,this);" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i>
</span></span>
            <span class="form_label-input-container"><label>Código Postal: </label><input id="input_codigoPostal" type="text" pattern="[0-9]{5}" onkeypress="control_compruebaKeyPress(event,this);" onchange="control_comprobarCampo(this);" maxlength="5" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <!--<span class="form_label-input-container"><label>Provincia: </label><select onchange="control_cambioProvincia();" class="form_signUp-provincias"></select><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>-->
            <span class="form_label-input-container"><label>Localidad: </label><input type="text" id="input_localidad" onkeypress="control_compruebaKeyPress(event,this);" onkeyup="control_compruebaKeyUp(event,this);" class="form_signUp-localidad" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Dirección: </label><input type="text" onkeypress="control_compruebaKeyPress(event,this);" id="input_direccion" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Número de teléfono: </label><input id="input_telefono" onkeypress="control_compruebaKeyPress(event,this);" type="text" data-preVal=""><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <input type="submit" value="Añadir dirección">
        </form>
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