
<div class="col-md-12 elementoSpecs">
    <div class="col-md-8 col-md-push2">
        <form  id="imagenSpecs" class="customForm" action="" method="post" enctype="multipart/form-data">
            <span class="col-md-12 contField"><span class="nombreInfo">Nombre:&nbsp;</span><span class="valorInfo"><input id="nombreImagen" type="text" name="nombreImagen"></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Número de Imágenes</span><span class="valorInfo"><input id="numImagenesConjunto" value="1" type="number" name="quantity" min="1" max="5"></span></span>
            <span class="col-md-12" id="imagenesConjunto"></span>
            <input type="submit" data-url="<?php echo $_POST["url"]?>" value="Listo!">
        </form>
    </div>
</div>

<script>
    var tope=$("#numImagenesConjunto").val();
    if(tope==1){
        var i=0;
        var j=i+1;
        $("#imagenesConjunto").append('<h3 class="bigOne">Imagen '+j+'</h3><span class="col-md-12 contField"><span class="nombreInfo">Anchura Contenedor</span><span class="valorInfo"><select id="anchuraContenedor'+i+'"><option value="12">100%</option><option value="11">91.66%</option><option value="10">83.33%</option><option value="9">75%</option><option value="8">66.66%</option><option value="7">58.33%</option><option value="6">50%</option><option value="5">41.66%</option><option value="4">33.33%</option><option value="3">25%</option><option value="2">16.66%</option><option value="1">8.33%</option><option value="auto">Ajustar a Imagen</option></select></span></span>            <span class="col-md-12 contField"><span class="nombreInfo">Alineado Horizontal</span><span class="valorInfo"><select onchange="cambiarAlineado('+i+');" id="alineadoContenedor'+i+'"><option value="xDefecto">Por Defecto</option><option value="izquierda">Izquierda</option><option value="derecha">Derecha</option></select></span></span>            <span class="col-md-12 contField"><div id="pushpull'+i+'" class="pushpull"></div></span>                <input type="file" name="img'+i+'" id="imagenSeleccionada'+i+'" accept="image/png, .jpeg, .jpg, image/gif">');
    }else{
        for(var i=0;i<tope;i++){
            var j=i+1;
            $("#imagenesConjunto").append('<h3>Imagen '+j+'</h3><span class="col-md-12 contField"><span class="nombreInfo">Anchura Contenedor</span><span class="valorInfo"><select id="anchuraContenedor'+i+'"><option value="12">100%</option><option value="11">91.66%</option><option value="10">83.33%</option><option value="9">75%</option><option value="8">66.66%</option><option value="7">58.33%</option><option value="6">50%</option><option value="5">41.66%</option><option value="4">33.33%</option><option value="3">25%</option><option value="2">16.66%</option><option value="1">8.33%</option><option value="auto">Ajustar a Imagen</option></select></span></span>            <span class="col-md-12 contField"><span class="nombreInfo">Alineado Horizontal</span><span class="valorInfo"><select onchange="cambiarAlineado('+i+');" id="alineadoContenedor'+i+'"><option value="xDefecto">Por Defecto</option><option value="izquierda">Izquierda</option><option value="derecha">Derecha</option></select></span></span>            <span class="col-md-12 contField"><div id="pushpull'+i+'" class="pushpull"></div></span>                <input type="file" name="img'+i+'" id="imagenSeleccionada'+i+'" accept="image/png, .jpeg, .jpg, image/gif">'); 
        }
    }
     $("#numImagenesConjunto").change(function(){
    var tope=$("#numImagenesConjunto").val();
     $("#imagenesConjunto").empty();
    for(var i=0;i<tope;i++){
        var j=i+1;
            $("#imagenesConjunto").append('<h3>Imagen '+j+'</h3><span class="col-md-12 contField"><span class="nombreInfo">Anchura Contenedor</span><span class="valorInfo"><select id="anchuraContenedor'+i+'"><option value="12">100%</option><option value="11">91.66%</option><option value="10">83.33%</option><option value="9">75%</option><option value="8">66.66%</option><option value="7">58.33%</option><option value="6">50%</option><option value="5">41.66%</option><option value="4">33.33%</option><option value="3">25%</option><option value="2">16.66%</option><option value="1">8.33%</option><option value="auto">Ajustar a Imagen</option></select></span></span>            <span class="col-md-12 contField"><span class="nombreInfo">Alineado Horizontal</span><span class="valorInfo"><select onchange="cambiarAlineado('+i+');" id="alineadoContenedor'+i+'"><option value="xDefecto">Por Defecto</option><option value="izquierda">Izquierda</option><option value="derecha">Derecha</option></select></span></span>            <span class="col-md-12 contField"><div id="pushpull'+i+'" class="pushpull"></div></span>                <input type="file" name="img'+i+'" id="imagenSeleccionada'+i+'" accept="image/png, .jpeg, .jpg, image/gif">');    
    }
     });
    
</script>

<script>
    function cambiarAlineado(ident){
        var alineado=$("#alineadoContenedor"+ident).val();
        $("#pushpull"+ident).empty();
        $("#pushpull"+ident).attr("data-empty",1);
        
        if(alineado=="izquierda"){
            var pull='<span class="nombreInfo">Izquierda: </span><span class="valorInfo"><select id="pushpullImagenConjunto'+ident+'"><option value="col-md-pull-1">8.33%</option><option value="col-md-pull-2">16.66%</option><option value="col-md-pull-3">25%</option><option value="col-md-pull-4">33.33%</option><option value="col-md-pull-5">41.66%</option><option value="col-md-pull-6">50%</option><option value="col-md-pull-7">58.33%</option><option value="col-md-pull-8">66.66%</option><option value="col-md-pull-9">75%</option><option value="col-md-pull-10">83.33%</option><option value="col-md-pull-11">91.66%</option><option value="col-md-pull-12">100%</option></select></span>';
           $("#pushpull"+ident).append(pull);
           $("#pushpull"+ident).attr("data-empty",0);
        }

        if(alineado=="derecha"){
            var push='<span class="nombreInfo">Derecha :</span><span class="valorInfo"><select id="pushpullImagenConjunto'+ident+'"><option value="col-md-push-1">8.33%</option><option value="col-md-push-2">16.66%</option><option value="col-md-push-3">25%</option><option value="col-md-push-4">33.33%</option><option value="col-md-push-5">41.66%</option><option value="col-md-push-6">50%</option><option value="col-md-push-7">58.33%</option><option value="col-md-push-8">66.66%</option><option value="col-md-push-9">75%</option><option value="col-md-push-10">83.33%</option><option value="col-md-push-11">91.66%</option><option value="col-md-push-12">100%</option></select></span>'; 
            $("#pushpull"+ident).append(push);
            $("#pushpull"+ident).attr("data-empty",0);
        }
    }  

</script>
<script>
$("#imagenSpecs").submit(function(event){
    event.preventDefault();
    var actualDir=$("#imagenSpecs").find("input[type=submit]").attr("data-url");
    var dir=actualDir.split("/");
    var dirJSON=actualDir.replace(dir[dir.length-1],"");
    var jsonSubirImagenes=dirJSON+"subirImagenes.php";
    var jsonGenerarConjuntoImagenes=dirJSON+"generarConjuntoImagenes.php";
    var procede=true;
    if($("#nombreImagen").val()=="" || $("#nombreImagen").val()==" "){
        alert("El nombre no puede estar vacío");
        procede=false;
    }else{
        var nombre=$("#nombreImagen").val();
        var arrayDatosImagenes=[];
        arrayDatosImagenes.push($("#nombreImagen").val());
        for(var total=0;total<$("#numImagenesConjunto").val();total++){
            
            var parametrosAdicionales=[];
            var anchura=$("#anchuraContenedor"+total).val();
            parametrosAdicionales.push(anchura);
            if($("#pushpull"+total).attr("data-empty")==0){
                parametrosAdicionales.push($("#pushpullImagenConjunto"+total).val());
            }else{
                parametrosAdicionales.push(" ");
            }
            //direccion imagen
            var img= $("#imagenSeleccionada"+total).val();
            if(img!="" && img!=" " && img!=undefined && img!=null){
                var arraySplit=img.split("\\");
                var pathFinal="/TFG/tienda/img/banners/"+arraySplit[arraySplit.length-1];
                parametrosAdicionales.push(pathFinal);
            }else{
                procede=false;
                alert("Archivo Vacio!");
                break;
            }
            
            arrayDatosImagenes.push(parametrosAdicionales);
        }
        if(procede==true){
        var formData = new FormData($(this)[0]);
        
            $.ajax({
                url: jsonSubirImagenes,
                type: "POST",
                data: formData,
                success: function (msg) {
                    if(msg=="ok"){
                         $.ajax({
                            url: jsonGenerarConjuntoImagenes,
                            method: "POST",
                            data: {"params":arrayDatosImagenes},
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
    }
});
</script>

<style>


</style>