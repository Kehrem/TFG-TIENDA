<div class="cold-md-12 lista_direcciones">
    <!--<span></span> -->
    <h4>MIS DIRECCIONES </h4>
</div>
<div class="col-md-12 display_none contFormsDireccion">
    
</div>

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
                if(result==""){
                    $(".lista_direcciones").append("<div class='col-md-12 direcciones_vacio'><h3>No hay direcciones</h3></div>");
                    
                    $(".direcciones_vacio").append("<div class='col-md-4 col-md-push-4 direccion'></div>");
                    $(".direccion").append("<div class='contDir'></div>");
                    $(".direccion").find(".contDir").append("<h5>Añadir nueva Direccion</h5>");
                     $(".direccion").find(".contDir").append("<span class='add_direccion2'><a onclick='control_addDireccion()'><i class='fa fa-plus fa-5x' aria-hidden='true'></i></a></span>");
                }else{
                    var n = JSON.parse(result);
                    var lastkey=0;
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
                        lastkey=key+1;
                    });
                     $(".lista_direcciones").append("<div class='col-md-4 direccion contDir-"+lastkey+"'></div>");
                    $(".contDir-"+lastkey).append("<div class='contDir'></div>");
                    $(".contDir-"+lastkey).find(".contDir").append("<h5>Añadir nueva Direccion</h5>");
                     $(".contDir-"+lastkey).find(".contDir").append("<span class='add_direccion2'><a onclick='control_addDireccion()'><i class='fa fa-plus fa-5x' aria-hidden='true'></i></a></span>");
                }
            }
        });

</script>