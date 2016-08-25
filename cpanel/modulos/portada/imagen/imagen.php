
<div class="col-md-12 elementoSpecs">
    <div class="col-md-8 col-md-push2">
        <form  id="imagenSpecs" class="customForm" action="" method="post" enctype="multipart/form-data">
            <span class="col-md-12 contField"><span class="nombreInfo">Nombre:&nbsp;</span><span class="valorInfo"><input id="nombreImagen" type="text" name="nombreImagen"></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Anchura Imagen</span><span class="valorInfo"><input value="320" type="number" min="320" max="1000" name="anchuraImagenValor" id="anchuraImagenValor"><select id="anchuraImagenUnidades"><option value="px">px</option><option value="em">em</option></select></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">altura Imagen</span><span class="valorInfo"><input value="150" type="number" min="100" max="500" name="alturaImagenValor" id="alturaImagenValor"><select id="alturaImagenUnidades"><option value="px">px</option><option value="em">em</option></select></span></span>
            <span class="col-md-12 contField">Ajustar a contenedor<input id="ajustarImgContenedor" type="checkbox" ></span> 
            <span class="col-md-12 contField"><span class="nombreInfo">Anchura Contenedor</span><span class="valorInfo"><select id="anchuraContenedor"><option value="12">100%</option><option value="11">91.66%</option><option value="10">83.33%</option><option value="9">75%</option><option value="8">66.66%</option><option value="7">58.33%</option><option value="6">50%</option><option value="5">41.66%</option><option value="4">33.33%</option><option value="3">25%</option><option value="2">16.66%</option><option value="1">8.33%</option><option value="auto">Ajustar a Imagen</option></select></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Alineado Horizontal</span><span class="valorInfo"><select id="alineadoContenedor"><option value="xDefecto">Por Defecto</option><option value="izquierda">Izquierda</option><option value="derecha">Derecha</option></select></span></span>
            <span class="col-md-12 contField"><div class="pushpull"></div></span>
                
                <input type='file' name='img' id="imagenSeleccionada" accept='image/png, .jpeg, .jpg, image/gif'>
            
            <input type="submit" data-url="<?php echo $_POST["url"]?>" value="Listo!">
        </form>
    </div>
</div>

<script>
    
    $("#alineadoContenedor").change(function(){
        var alineado=$("#alineadoContenedor").val();
        
        $(".pushpull").empty();
        $(".pushpull").attr("data-empty",1);
        
        if(alineado=="izquierda"){
            var pull='<span class="nombreInfo">Izquierda: </span><span class="valorInfo"><select id="pushpullCarousel"><option value="col-md-pull-1">8.33%</option><option value="col-md-pull-2">16.66%</option><option value="col-md-pull-3">25%</option><option value="col-md-pull-4">33.33%</option><option value="col-md-pull-5">41.66%</option><option value="col-md-pull-6">50%</option><option value="col-md-pull-7">58.33%</option><option value="col-md-pull-8">66.66%</option><option value="col-md-pull-9">75%</option><option value="col-md-pull-10">83.33%</option><option value="col-md-pull-11">91.66%</option><option value="col-md-pull-12">100%</option></select></span>';
            $(".pushpull").append(pull);
            $(".pushpull").attr("data-empty",0);
        }

        if(alineado=="derecha"){
            var push='<span class="nombreInfo">Derecha :</span><span class="valorInfo"><select id="pushpullCarousel"><option value="col-md-push-1">8.33%</option><option value="col-md-push-2">16.66%</option><option value="col-md-push-3">25%</option><option value="col-md-push-4">33.33%</option><option value="col-md-push-5">41.66%</option><option value="col-md-push-6">50%</option><option value="col-md-push-7">58.33%</option><option value="col-md-push-8">66.66%</option><option value="col-md-push-9">75%</option><option value="col-md-push-10">83.33%</option><option value="col-md-push-11">91.66%</option><option value="col-md-push-12">100%</option></select></span>'; 
            $(".pushpull").append(push);
            $(".pushpull").attr("data-empty",0);
        }
});
</script>
<script>
$("#imagenSpecs").submit(function(event){
    event.preventDefault();
    var actualDir=$("#imagenSpecs").find("input[type=submit]").attr("data-url");
    var dir=actualDir.split("/");
    var dirJSON=actualDir.replace(dir[dir.length-1],"");
    var jsonSubirImagen=dirJSON+"subirImagen.php";
    var jsonGenerarImagen=dirJSON+"generarImagen.php";
    var procede=true;
    if($("#nombreImagen").val()=="" || $("#nombreImagen").val()==" "){
        alert("El nombre no puede estar vacío");
        procede=false;
    }
    
    if(procede==true){
        var nombre=$("#nombreImagen").val();
        var anchura=$("#anchuraContenedor").val();
        var parametrosAdicionales=[];
        parametrosAdicionales.push(nombre);
        parametrosAdicionales.push(anchura);
        if($(".pushpull").attr("data-empty")==0){
            parametrosAdicionales.push($("#pushpullCarousel").val());
        }else{
            parametrosAdicionales.push(" ");
        }
        //direccion imagen
        var img= $("#imagenSeleccionada").val();
        var arraySplit=img.split("\\");
        var pathFinal="/TFG/tienda/img/banners/"+arraySplit[arraySplit.length-1];
        parametrosAdicionales.push(pathFinal);
        //valores imagen
        var anchura=[$("#anchuraImagenValor").val(),$("#anchuraImagenUnidades").val()];
        var altura=[$("#alturaImagenValor").val(),$("#alturaImagenUnidades").val()];
        parametrosAdicionales.push(anchura);
        parametrosAdicionales.push(altura);
        var checked=false;
        if($("#ajustarImgContenedor").is(':checked')){
            checked=true;
        }
        parametrosAdicionales.push(checked);
        var formData = new FormData($(this)[0]);
        
            $.ajax({
                url: jsonSubirImagen,
                type: "POST",
                data: formData,
                success: function (msg) {
                    if(msg=="ok"){
                         $.ajax({
                            url: jsonGenerarImagen,
                            method: "POST",
                            data: {"params":parametrosAdicionales},
                            success: function (msg) {
                               if(msg=="ok"){
                                   
                               }else{
                                   alert("Error al generar el archivo");
                               }
                                abrir_elementosPortada();
                            }
                        });
                    }else{
                       alert("Error al subir las imagenes");
                    }
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
            
    }
});
</script>

<style>


</style>