<div class="col-md-12 contDetallesKPI">
            

</div>
<script>
$.ajax({
        url:"json/getParametros.php",
        method:"POST",
        data:{elemento:<?php echo $_POST["elemento"]?>},
        success: function(result){
            if(result!="sin resultados"){
                var n=JSON.parse(result);
                var nombre="";
                $.each(n,function(key,value){
                    
                    $(".contDetallesKPI").append("<div class='detalleKpi col-md-12'><span class='nombreParametro col-md-4'>Nombre:</span><span class='valorParametro col-md-8'>&nbsp;"+value["nombre"]+"</span></div>");    
                    $(".contDetallesKPI").append("<div class='detalleKpi col-md-12'><span class='nombreParametro col-md-4'>Nombre:</span><span class='valorParametro col-md-8'>&nbsp;"+value["nombre"]+"</span></div>");    
                    $(".contDetallesKPI").append("<div class='detalleKpi col-md-12'><span class='nombreParametro col-md-4'>Descripcion:</span><span class='valorParametro col-md-8'>&nbsp;"+value["descripcion"]+"</span></div>");    
                    $(".contDetallesKPI").append("<div class='detalleKpi col-md-12'><span class='nombreParametro col-md-4'>Tabla:</span><span class='valorParametro col-md-8'>&nbsp;"+value["tabla"]+"</span></div>");    
                    $(".contDetallesKPI").append("<div class='detalleKpi col-md-12'><span class='nombreParametro col-md-4'>Eje X:</span><span class='valorParametro col-md-8'>&nbsp;"+value["param1"]+"</span></div>");    
                    $(".contDetallesKPI").append("<div class='detalleKpi col-md-12'><span class='nombreParametro col-md-4'>Eje Y:</span><span class='valorParametro col-md-8'>&nbsp;"+value["param2"]+"</span></div>");    
                       
                  nombre=value["nombre"]  ;
                    
                });
                  gestion_cargarGrafica(nombre);
            }
        }
    });
</script>