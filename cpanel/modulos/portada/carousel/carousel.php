
<div class="col-md-12 elementoSpecs">
    <div class="col-md-8 col-md-push2">
        <form  id="carouselSpecs" class="customForm" action="json/generarCarousel.php" method="post" enctype="multipart/form-data">
            Mínimo 1 | Máximo 5:
            <span class="col-md-12 contField"><span class="nombreInfo">Nombre:&nbsp;</span><span class="valorInfo"><input id="nombreCarousel" type="text" name="nombreCarousel"></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Anchura</span><span class="valorInfo"><select id="anchuraCarousel"><option value="col-md-12">100%</option><option value="col-md-11">91.66%</option><option value="col-md-10">83.33%</option><option value="col-md-9">75%</option><option value="col-md-8">66.66%</option><option value="col-md-7">58.33%</option><option value="col-md-6">50%</option><option value="col-md-5">41.66%</option><option value="col-md-4">33.33%</option><option value="col-md-3">25%</option><option value="col-md-2">16.66%</option><option value="col-md-1">8.33%</option></select></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Alineado Horizontal</span><span class="valorInfo"><select id="alineadoCarousel"><option value="xDefecto">Por Defecto</option><option value="izquierda">Izquierda</option><option value="derecha">Derecha</option></select></span></span>
            <span class="col-md-12 contField"><div class="pushpull"></div></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Número de Imágenes</span><span class="valorInfo"><input id="numImagenesCarousel" value="1" type="number" name="quantity" min="1" max="5"></span></span>
            <span id="imgsCarousel" data-empty=1></span>
            <input type="submit" data-url="<?php echo $_POST["url"]?>" value="Listo!">
        </form>
    </div>
</div>

<script>
    var tope=$("#numImagenesCarousel").val();
    if(tope==1){
        $("#imgsCarousel").append("<input type='file' name='img0' accept='image/png, .jpeg, .jpg, image/gif'>");     
    }else{
        for(var i=0;i<tope;i++){
            $("#imgsCarousel").append("<input type='file' name='img"+i+"' accept='image/png, .jpeg, .jpg, image/gif>'");    
        }
    }
    
    
</script>
<script>

    $("#numImagenesCarousel").change(function(){
    var tope=$("#numImagenesCarousel").val();
     $("#imgsCarousel").empty();
    console.log(tope);
    for(var i=0;i<tope;i++){
            $("#imgsCarousel").append("<input type='file' name='img"+i+"' accept='image/png, .jpeg, .jpg, image/gif'>");    
    }
});
    
    $("#alineadoCarousel").change(function(){
        var alineado=$("#alineadoCarousel").val();
        
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
$("#carouselSpecs").submit(function(event){
    event.preventDefault();
    var actualDir=$("#carouselSpecs").find("input[type=submit]").attr("data-url");
    var dir=actualDir.split("/");
    var dirJSON=actualDir.replace(dir[dir.length-1],"");
    var jsonSubirImagenes=dirJSON+"subirImagenes.php";
    var jsonGenerarCarousel=dirJSON+"generarCarousel.php";
    var procede=true;
    if($("#nombreCarousel").val()=="" || $("#nombreCarousel").val()==" "){
        alert("El nombre no puede estar vacío");
        procede=false;
    }
    
    var imgs= $("#imgsCarousel").find("input");
    var nombreImgs=[];
    for($l=0;$l<imgs.length;$l++){
        if($(imgs[$l]).val()==""){
            procede=false;

        }else{
            var pathImg=$(imgs[$l]).val();
            var arraySplit=pathImg.split("\\");
            var pathFinal="/TFG/tienda/img/banners/"+arraySplit[arraySplit.length-1];
            nombreImgs.push(pathFinal);
        }
    }
    
    if(procede==true){
        var nombre=$("#nombreCarousel").val();
        var anchura=$("#anchuraCarousel").val();
        var alineado=$("#alineadoCarousel").val();
        var parametrosAdicionales=[];
        parametrosAdicionales.push($("#numImagenesCarousel").val());
        parametrosAdicionales.push(nombre);
        parametrosAdicionales.push(anchura);
        if($(".pushpull").attr("data-empty")==0){
            parametrosAdicionales.push($("#pushpullCarousel").val());
        }else{
            parametrosAdicionales.push(" ");
        }
        parametrosAdicionales.push(nombreImgs);
        //parametrosAdicionales.push($(this)[0])
        var formData = new FormData($(this)[0]);
        
            $.ajax({
                url: jsonSubirImagenes,
                type: "POST",
                data: formData,
                success: function (msg) {
                    if(msg=="ok"){
                         $.ajax({
                            url: jsonGenerarCarousel,
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