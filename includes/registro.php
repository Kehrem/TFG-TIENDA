<div class="col-md-12">
    <div class="col-md-6 col-md-push-3">
        <form class="form form_registro" id="form_registro" onsubmit="control_compruebaFormRegistro(event,this);">

            <h4>Formulario de Registro</h4>
            <span class="form_label-input-container"><label>Nombre: </label><input id="input_nombre" type="text" pattern="[a-zA-Z]{3,15}" onchange="control_comprobarCampo(this);" onkeypress="control_compruebaKeyPress(event,this);" maxlength="15" onkeyup="control_compruebaKeyUp(event,this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i>
</span></span>
            <span class="form_label-input-container"><label>Apellidos: </label><input type="text" id="input_apellidos" maxlength="20" pattern="[A-Za-z\s]{3,20}" onkeypress="control_compruebaKeyPress(event,this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Email: </label><input type="email" id="input_email"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Confirma Email: </label><input type="email" id="input_confirmarEmail"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Contraseña: </label><input type="password" id="input_contrasenya" maxlength="20" onkeypress="control_compruebaKeyPress(event,this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Confirma Contraseña: </label><input type="password" id="input_confirmarContrasenya" maxlength="20"  onkeypress="control_compruebaKeyPress(event,this);"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Código Postal: </label><input id="input_codigoPostal" type="text" pattern="[0-9]{5}" onkeypress="control_compruebaKeyPress(event,this);" onchange="control_comprobarCampo(this);" maxlength="5"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <!--<span class="form_label-input-container"><label>Provincia: </label><select onchange="control_cambioProvincia();" class="form_signUp-provincias"></select><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>-->
            <span class="form_label-input-container"><label>Localidad: </label><input type="text" id="input_localidad" onkeypress="control_compruebaKeyPress(event,this);" onkeyup="control_compruebaKeyUp(event,this);" class="form_signUp-localidad"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Dirección: </label><input type="text" onkeypress="control_compruebaKeyPress(event,this);" id="input_direccion"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Número de teléfono: </label><input id="input_telefono" onkeypress="control_compruebaKeyPress(event,this);" type="text"><span class="form_campo_obligatorio">&nbsp;*&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
            <span class="form_label-input-container"><label>Accepto las <a href="terminos%20y%20condiciones%20de%20uso.php" target="_blank">Condiciones Generales</a> </label><input type="checkbox" onclick="control_comprobarCampo(this);" id="input_condiciones"><span class="form_campo_obligatorio">&nbsp;*&nbsp; </span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
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
    $("#input_nombre").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_apellidos").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_email").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_confirmarEmail").focusout(function(){
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
    $("#input_contrasenya").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_confirmarContrasenya").focusout(function(){
        control_comprobarCampo(this);
    });

</script>