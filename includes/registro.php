<div class="col-md-9">
    <div class="col-md-6 col-md-push-3">
        <form class="form form_registro">

            <h4>Formulario de Registro</h4>
            <span class="form_label-input-container"><label>Nombre: </label><input type="text" id="input_nombre" onkeypress="control_compruebaKeyPress(event,this);" pattern="[A-Za-z]{3,15}" maxlength="15" onchange="control_comprobarCampo(this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i>
</span></span>
            <span class="form_label-input-container"><label>Apellidos: </label><input type="text" id="input_apellidos" maxlength="20" pattern="[A-Za-z]{3,20}" onchange="control_comprobarCampo(this);" ><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Email: </label><input type="email" id="input_email" onchange="control_comprobarCampo(this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Confirma Email: </label><input type="email" id="input_confirmaEmail" onchange="control_comprobarCampo(this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Código Postal: </label><input id="input_codigoPostal" type="text" pattern="[0-9]{5}" onkeypress="control_compruebaKeyPress(event,this);" onchange="control_comprobarCampo(this);" maxlength="5"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <!--<span class="form_label-input-container"><label>Provincia: </label><select onchange="control_cambioProvincia();" class="form_signUp-provincias"></select><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>-->
            <span class="form_label-input-container"><label>Localidad: </label><input type="text" id="input_localidad" onkeypress="control_compruebaKeyPress(event,this);" onkeyup="control_compruebaKeyUp(event,this);" class="form_signUp-localidad"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Dirección: </label><input type="text"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Número de teléfono: </label><input type="text"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Accepto las condiciones de blablabla </label><input type="checkbox"><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <input type="submit" value="Darme de alta">
        </form>
    </div>
</div>
<script>

    //rellenar provincias
    //control_getProvincias();
    $("#input_codigoPostal").focusout(function(){
        control_comprobarCampo(this);
    });
    

</script>