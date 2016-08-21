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
                    
                    var span="<span class='kpis' id="+value["ident"]+" data-padre='"+value["ident_padre"]+"' data-nombre='"+value["nombre"]+"' onclick='gestion_rellenarDetallesKpi(this)'>"+value["nombre"]+"<span class='eliminarKpi pull-right'>&nbsp;<i class='fa fa-trash' onclick='gestion_eliminarKpi(this);' aria-hidden='true'></i></span></span>";                         
                    //&nbsp;<i class='fa fa-minus' onclick='eliminarKpi(this);' aria-hidden='true'></i>
                    if(activo==null){
                        activo=value["ident"];
                        grafica=value["nombre"];
                    }
                    if(value["ident_padre"]!=null){
                       
                        var cpadre=$("#padre"+value["ident_padre"]).length;
                       if(cpadre>0){
                           
                       }else{
                           $(".estadisticas_contKpi").append("<span class='kpis_cabezaGrupo' id='padre"+value["ident_padre"]+"'>"+value["padre"]+"<span class='eliminarKpi pull-right'>&nbsp;<i class='fa fa-trash' onclick='gestion_eliminarGrupoKpis(this);' aria-hidden='true'></i></span></span>");
                       }
                        
                        
                        
                        var nh=$("#padre"+value["ident_padre"]).find(".kpis_subMenu").length;
                       if(nh>0){
                           //tiene hijo -- introducimos en el hijo
                            $("#padre"+value["ident_padre"]).find(".kpis_subMenu").append(span);
                    
                       }else{
                           //creamos hijo y añadimos a el
                           $("#padre"+value["ident_padre"]).append("<div class='kpis_subMenu'></div>");                                         
                        $("#padre"+value["ident_padre"]).find(".kpis_subMenu").append(span);
                           
                       }
                                                
                    }else{

                        $(".estadisticas_contKpi").append(span);
                        
                    }
                    
                });
                
            }else{
                
            }
                var addKpi='<div onclick="gestion_abrirNuevoKpi();" class="col-md-12 addKpi"><i class="fa fa-plus fa-3x" aria-hidden="true"></i></div>';
                $(".estadisticas_contKpi").append(addKpi);
                $("#"+activo).addClass("graficaActiva");
                gestion_rellenarDetallesKpi($(".graficaActiva"));
                
        }
    });
    
}
function gestion_cargarGrafica(nombre){
    $(".estadisticas_grafica").find("img").remove();
    $(".estadisticas_grafica").append("<img src='graficos/"+nombre+".php'>");
    //$(".estadisticas_grafica").append("<img src='graficos/default.php'>");
}

function gestion_cargarParametrosGrafica(idGrafica){
    $.ajax({
        url:"json/getParametros.php",
        method:"POST",
        data:{id:idGrafica},
        success: function(result){
        }
    });
}

function gestion_eliminarKpi(kpi){
    
    var id=$(kpi).parent().parent().attr("id");
    console.log(id);
    $.ajax({
        url:"json/eliminarKpi.php",
        method:"POST",
        data:{id:id},
        success: function(result){
            if(result=="ok"){
                $(".estadisticas_contKpi").find(".kpis").remove();
                gestion_rellenarContKpis();
                
            }
        }
    });
}

function gestion_abrirNuevoKpi(){
    
    $(".contParametros").empty();
    $(".contParametros").load("includes/nuevoKpi.php");
}

function gestion_cargarParametrosTabla(nombreTabla){
    $.ajax({
        url:"json/getParametrosTabla.php",
        method:"POST",
        data:{tabla:nombreTabla},
        success: function(result){
            if(result!="sin resultados"){
                var n=JSON.parse(result);
                $("#paramX").empty();  
                $("#paramY").empty();  
                $.each(n,function(key,value){
                    
                    $("#paramX").append("<option value='"+value["campo"]+"' data-type='"+value["tipo"]+"'>"+value["campo"]+"</option>"); 
                    //console.log(value["tipo"]); 
                    var ints=value["tipo"].search("int");
                    var floats=value["tipo"].search("float");
                    if(ints!=-1 || floats!=-1){
                        $("#paramY").append("<option value='"+value["campo"]+"'>"+value["campo"]+"</option>");  
                    }
                });
            }
        }
    });
}

function gestion_nuevoKpi(event,form){
    event.preventDefault();
    var nombre=$("#input_nombre").val();
    var regexp=/[a-zA-Z][a-zA-Z ]{3,}/;
    if(nombre.match(regexp)){
        var array=[];
        array.push(nombre);
        var selects=$(form).find("select");
        for(var i=0;i<selects.length;i++){
            var params=[$(selects[i]).val(),$(selects[i]).find('option[value="'+$(selects[i]).val()+'"]').attr("data-type")];
            array.push(params);
        }
        var descripcion=$("#input_descripcion").val();
        array.push(descripcion);
       $.ajax({
        url:"json/nuevoArchivoKpi.php",
        method:"POST",
        data:{data:array},
        success: function(result){
            if(result=="ok"){
                //var n=JSON.parse(result);
                gestion_cargarGraficasKpis();
            }
        }
    });
        
    }else{
     alert("Nombre: Mínimo 4 caracteres");
    }
}

function gestion_rellenarDetallesKpi(elemento){
    
    $(".graficaActiva").removeClass("graficaActiva");
    $(elemento).addClass("graficaActiva");
    $(".contParametros").load("includes/gestion_detallesKpi.php",{elemento:$(elemento).attr("id")});
}