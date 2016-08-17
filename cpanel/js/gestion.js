function gestion_cargarGraficasKpis(){
    $("main").load("includes/gestion_GraficasKpis.php");
}

function gestion_rellenarContKpis(){
    $.ajax({
        url:"json/getKpis.php",
        method:"POST",
        success: function(result){
            if(result!="sin resultados"){
                var n= JSON.parse(result);
                var activo=null;
                var grafica="";
                $.each(n,function(key,value){
                    
                    var span="<span class='kpis' id="+value["ident"]+" data-padre='"+value["padre"]+"'>"+value["nombre"]+"</span>"; 
                    if(activo==null){
                        activo=value["ident"];
                        grafica=value["nombre"];
                    }
                    if(value["padre"]!=null){
                        
                       var nh=$("#"+value["padre"]).children().length;
                       if(nh>0){
                           //tiene hijo -- introducimos en el hijo
                           $("#"+value["padre"]).children(0).append(span);
                    
                       }else{
                           //creamos hijo y añadimos a el
                           $("#"+value["padre"]).append("<div class='kpis_subMenu'></div>");
                           $("#"+value["padre"]).children(0).append(span);
                           
                           
                       }
                                                
                    }else{
                       $(".estadisticas_contKpi").append(span);
                        
                    }
                    
                });
                
                $("#"+activo).addClass("graficaActiva");
                gestion_cargarGrafica(grafica);
                gestion_cargarParametrosGrafica($("#"+activo).attr("id"));
            }else{
                
            }
        }
    });
    
}
function gestion_cargarGrafica(nombre){
    $(".estadisticas_grafica").find("img").remove();
    $(".estadisticas_grafica").append("<img src='graficos/"+nombre+".php'>");
}

function gestion_cargarParametrosGrafica(idGrafica){
    
}
