<form class="form form_datosPersonales" id="form_datosPersonales" onsubmit="control_comprobarFormDatosPersonales(event,this);">
    <h4>Datos Personales</h4>
        <span class="form_label-input-container"><label>Nombre: </label><input id="input_nombre" type="text" pattern="[a-zA-Z]{3,15}" onchange="control_comprobarCampo(this);" onkeypress="control_compruebaKeyPress(event,this);" maxlength="15" onkeyup="control_compruebaKeyUp(event,this);" disabled="disabled" data-preVal="<?php echo $_POST["data"][0]?>"></span>
        <span class="form_label-input-container"><label>Apellidos: </label><input type="text" id="input_apellidos" maxlength="20" pattern="[A-Za-z\s]{3,20}" onkeypress="control_compruebaKeyPress(event,this);" disabled="disabled" data-preVal="<?php echo $_POST["data"][1]?>"></span>
        <span class="form_label-input-container"><label>Cambiar Email: </label><input type="email" id="input_cambiarEmail" data-preVal="<?php echo $_POST["data"][3]?>"><span class="form_campo_obligatorio">&nbsp;&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
        <span class="form_label-input-container"><label>Confirma Nuevo Email: </label><input type="email" id="input_confirmarCambiarEmail" data-preVal=""><span class="form_campo_obligatorio">&nbsp;&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
        <span class="form_label-input-container"><label>Cambiar Contraseña: </label><input type="password" id="input_cambiarContrasenya" maxlength="20" onkeypress="control_compruebaKeyPress(event,this);" data-preVal=""><span class="form_campo_obligatorio">&nbsp;&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
        <span class="form_label-input-container"><label>Confirma Nueva Contraseña: </label><input type="password" id="input_confirmarCambiarContrasenya" maxlength="20"  onkeypress="control_compruebaKeyPress(event,this);" data-preVal=""><span class="form_campo_obligatorio">&nbsp;&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span></span>
        <span class="form_label-input-container confirmarCambiosDP"><label>Contraseña (Actual): </label><input type="password" id="input_confirmarCambiarDatos" maxlength="20"  onkeypress="control_compruebaKeyPress(event,this);" data-preVal=""><span class="form_campo_obligatorio">&nbsp;&nbsp;</span><span class="form_campo_ayuda"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        <span class="datosPersonalesInput_info">Introduce tu contraseña actual para guardar los cambios realizados!</span></span>
        <input type="submit" value="Actualizar Datos">
        </form>
<script>

    $("#input_nombre").val($("#input_nombre").attr("data-preVal"));
    $("#input_apellidos").val($("#input_apellidos").attr("data-preVal"));
    $("#input_cambiarEmail").val($("#input_cambiarEmail").attr("data-preVal"));
    $("#input_cambiarEmail").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_confirmarCambiarEmail").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_cambiarContrasenya").focusout(function(){
        control_comprobarCampo(this);
    });
    $("#input_confirmarCambiarContrasenya").focusout(function(){
        control_comprobarCampo(this);
    });
     $("#input_confirmarCambiarDatos").focusout(function(){
        control_comprobarCampo(this);
    });

</script>