<div class="cold-md-12 lista_direcciones">
    <!--<span></span> -->
    <h4>MIS DIRECCIONES </h4>
    
</div>
<!--
<form class="form form_añadirDireccion" id="form_añadirDireccion" onsubmit="control_comprobarFormDatosPersonales(event,this);">
    <h4>Añadir Direccion</h4>
        
        <input type="submit" value="Actualizar Datos">
        </form>
-->
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
                    console.log(key);
                    console.log(value);
                    var d=$(".lista_direcciones").append("<div id='direccion-"+key+"' class='direccion row'></div>");
                    $("#direccion-"+key).append("<h5>"+value[4]+"</h5>");
                    $("#direccion-"+key).append("<p>Código Postal: "+value[0]+"</p>");
                    $("#direccion-"+key).append("<p>Localidad: "+value[1]+"</p>");
                    $("#direccion-"+key).append("<p>Dirección: "+value[2]+"</p>");
                    $("#direccion-"+key).append("<p>Teléfono: "+value[3]+"</p>");
                });
            }
        });

</script>