function funciones_jstest(){
    alert("balls");
}

function funciones_phptest(){
    
    $.ajax({
        url:"json/phptest.php",
        method:"POST",
        success: function(result){
            
        }
    });
    
}

function funciones_recogerDatosBusqueda(busqueda){
    if(busqueda.length>0){
    $("#resultadosBusqueda").empty();
    $.ajax({
        url:"json/buscar.php",
        method:"POST",
        data: {"buscar":busqueda},
        success: function(result){
            var n=JSON.parse(result);
            if(result!="" && result!=" " && n.length>0){
                $.each(n,function(key,value){
                    if(value[0]=="Categoria"){
                        var div="<div data-ident='"+value[2]+"' class='resultadoBusqueda'><h4>"+value[1]+"</h4><p>Categoría</p></div>";
                    }else{
                        var div="<div data-ident='"+value[3]+"' class='resultadoBusqueda'><h4>"+value[1]+"</h4><img class='miniaturaBusqueda' src='"+value[4]+"'><p>"+value[2]+"</p></div>";
                    }
                $("#resultadosBusqueda").append(div);
                });
            }else{
                console.log("sin resultados");
                var div="<div class='resultadoBusqueda'>Sin resultados</div>";
                $("#resultadosBusqueda").append(div);
            }
            $("#resultadosBusqueda").append("<div id='mostrarTodosResultados' class='col-md-12'><a>Mostrar Todos los resultados</a></div>");

        }
                
    });
    }
}

function funciones_minimizar(param){
    if(param=="compararArticulos"){
        $(".contCompararArticulos").css("display","none");
        $(".contenedor_compararArticulosButton").css("display","none");
        $(".minimizarCompararArticulos").removeClass("fa-minus");
        $(".minimizarCompararArticulos").addClass("fa-plus");
        $(".minimizarCompararArticulos").attr("onclick","");
        $(".minimizarCompararArticulos").click(function(){
            control_restaurar("compararArticulos");
        });
        
    }
}
function funciones_restaurar(param){
    if(param=="compararArticulos"){
        $(".contCompararArticulos").css("display","inline-block");
        $(".contenedor_compararArticulosButton").css("display","inline-block");
        $(".minimizarCompararArticulos").removeClass("fa-plus");
        $(".minimizarCompararArticulos").addClass("fa-minus");
        $(".minimizarCompararArticulos").attr("onclick","");
        $(".minimizarCompararArticulos").click(function(){
            control_minimizar("compararArticulos");
        });
        
    }
}
function funciones_cerrar(param){
    if(param=="formDirecciones"){
        $(".contFormsDireccion").fadeOut(500);
    }
    if(param=="compararArticulos"){
        $(".contenedor_compararArticulos").fadeOut(300);
        setTimeout(function(){$(".contCompararArticulos").empty();},350); 
        sessionStorage.clear();
    }
}

function funciones_navegarA(param){
    window.location.href=param;
}

function funciones_cargarAreaUsuarios(modo){
    if(modo=="acceso"){
        $(".user_area").load("includes/areaUsuarios_acceso.php");
    }else{
        $(".user_area").load("includes/areaUsuarios_sinAcceso.php");
    }
}


function funciones_popUpProcesando(param){
    
    if(param=="abrir"){
        var popup = '<div class="contenedor_popUp-cargando">';
        popup += '	<div class="contenido_popUp-cargando">';
        popup += '		<div class="popUp_icono"><i class="fa fa-spinner fa-spin fa-fw fa-5x" aria-hidden="true"></i><h4>Procesando...</h4></div>';
        popup += '	</div>';
        popup += '</div>';
        $('main').append(popup);
        
    }
    if(param=="cerrar"){
        $(".contenedor_popUp-cargando").remove();
    }
    
}

function funciones_toggleResponsiveNav(){
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}

function funciones_cargarMain(){
    
    $("main").load("includes/index_main.php");
    document.getElementById("main").scrollIntoView();
    $(".current_navigation_ul").empty();
    $(".current_navigation_ul").append('<li><a href="#Home" onclick="control_cargarMain()">Home</a></li>');    
}
function funciones_cargarMain2(){
    
     $.ajax({
        url:"json/getElementosIndex.php",
        success: function(result){
           if(result!="sin elementos"){
               $("main").html("");
                var n=JSON.parse(result);
               $.each(n,function(key,value){
                  $("main").append("<div id='orden-"+key+"'></div>");
                   $.get(value["url"])
                     .success(function(data) {
                         $("#orden-"+key).html(data);
                     });
               });
            }
            $(".current_navigation_ul").empty();
            $(".current_navigation_ul").append('<li><a href="#Home" onclick="control_cargarMain()">Home</a></li>');
            /*
            $("main").load("includes/index_main2.php");
             document.getElementById("main").scrollIntoView();
            $(".current_navigation_ul").empty();
            $(".current_navigation_ul").append('<li><a href="#Home" onclick="control_cargarMain()">Home</a></li>');    */
        }
                
    });
   /*        $("main").load("includes/index_main.php");
    document.getElementById("main").scrollIntoView();
    $(".current_navigation_ul").empty();
    $(".current_navigation_ul").append('<li><a href="#Home" onclick="control_cargarMain()">Home</a></li>');   */
}

function funciones_cargarRegistroError(){
    
    $("main").load("includes/registro_error.php");
    document.getElementById("main").scrollIntoView();
}

function funciones_cargarRegistroCompletado(){
    
    $("main").load("includes/registro_completado.php");
    document.getElementById("main").scrollIntoView();
}

function funciones_cargarRegistroActivado(){
    
    $("main").load("includes/registro_activado.php");
    document.getElementById("main").scrollIntoView();
}

function funciones_cargarRegistroYaActivado(){
    
    $("main").load("includes/registro_ya-activado.php");
    document.getElementById("main").scrollIntoView();
}

function funciones_fetchCategorias(){
    $.ajax({
        url:"json/getCategorias.php",
        method:"POST",
        dataType: "json",
        success: function(result){
            funciones_cargarCategorias(result);
        }
                
    });
}

function funciones_cargarCategorias(r){
    
    $.each(r,function(key,value){
        
        var a ='"'+value["nombre"]+'"';
            var im=value["url_Img"];
            var ident=value["ident"];
            var identraiz=value["raiz"];
            var aimident=[a,im,ident];
        
        if(value["raiz"]==null){
            ///
            
            $(".catalogoProductos").append('<a href="#" name="'+value["ident"]+'" data-urlimg="'+value["url_Img"]+'" data-nombre='+value["nombre"]+' id="listaCategorias-item-'+key+'" class="listaCategorias-item list-group-item">'+value["nombre"]+'</a>');
        }if(value["raiz"]!=null){
            
            var n=(value["raiz"])-1;
            if($("#listaCategorias-item-"+n).children(0).hasClass("dropdown-content")){
               $("#listaCategorias-item-"+n).children(0).append('<a href="#" tabindex="'+($("#listaCategorias-item-"+n).children(0).index()+1+key)+'" id="listaCategorias-item-'+key+'" class="listaCategorias-item lgi-t list-group-item">'+value["nombre"]+'</a>');

                               
            }else{
                 var n=(value["raiz"])-1;
                $("#listaCategorias-item-"+n).append('<div class="dropdown-content"></div>');
                ///
                $("#listaCategorias-item-"+n).children(0).append('<a href="#" id="listaCategorias-item-'+key+'"   class="listaCategorias-item lgi-t list-group-item" tabindex="'+($("#listaCategorias-item-"+n).children(0).index()+1+key)+'">'+value["nombre"]+'</a>');
                
                
            }
           
        }
        //$("#listaCategorias-item-"+key).attr("tabindex",parseInt(identraiz));
        $("#listaCategorias-item-"+key).click(function(event){
           
            event.preventDefault();
            control_contenidoCategorias(a,im,ident,identraiz);
            return false;
            
        });
        
    });
    

    
}

function funciones_cargarCategorias2(r){

    $.each(r,function(key,value){
        
        var a ='"'+value["nombre"]+'"';
            var im=value["url_Img"];
            var ident=value["ident"];
            var identraiz=value["raiz"];
            var aimident=[a,im,ident];
        
        if(value["raiz"]==null){
            ///
            
            $(".despliegaCategorias").append('<a href="#" name="'+value["ident"]+'" data-urlimg="'+value["url_Img"]+'" data-nombre='+value["nombre"]+' id="listaCategorias-item-'+key+'" class="listaCategorias-item">'+value["nombre"]+'</a>');
        }
        if(value["raiz"]!=null){
            
            var n=(value["raiz"])-1;
            if($("#listaCategorias-item-"+n).children(0).hasClass("dropdown-content")){
               $("#listaCategorias-item-"+n).children(0).append('<a href="#" id="listaCategorias-item-'+key+'" class="listaCategorias-item lgi-t">'+value["nombre"]+'</a>');
                               
            }else{
                 var n=(value["raiz"])-1;
                $("#listaCategorias-item-"+n).append('<div class="dropdown-content"></div>');
                ///
                $("#listaCategorias-item-"+n).children(0).append('<a href="#" id="listaCategorias-item-'+key+'"  class="listaCategorias-item lgi-t">'+value["nombre"]+'</a>');
                
                
            }
           
        }
        $("#listaCategorias-item-"+key).click(function(event){
           
            event.preventDefault();
            control_contenidoCategorias(a,im,ident,identraiz);
            return false;
            
        });
        
        
    });
}

function funciones_contenidoCategorias(param,param2,param3,param4){
 
    $("main").load("includes/display_categoria.php",{'data[]': [param,param2,param3,param4]});
    document.getElementById("main").scrollIntoView();
    
    /*/*//*/*/
    $(".current_navigation_ul").empty();
    $(".current_navigation_ul").append('<li><a href="#" onclick="control_cargarMain()">Home</a></li>');    
    if(param4==null){
         var send=[param,param2,param3,param4];
        var ctgry=param.replace('"',"");
        var ctgry=ctgry.replace('"','');
       //$(".current_navigation_ul").append('<li class="current_Category_spacer">&nbsp;&#187;</li>');
       $(".current_navigation_ul").append('<li><span class="current_Category_spacer">&nbsp;&#187;</span>&nbsp;<a href="#" id="actual_Categoria" class="current_Category">'+ctgry+'</a></li>');
        $("#actual_Categoria").click(function(event){
           
            event.preventDefault();
            control_contenidoCategorias(param,param2,param3,param4);
            return false;
            
        });
        
    }else{
        var object=document.getElementsByName(param4);
        var nombreCategoriaPadre=object[0].innerHTML;
        var imagenCategoriaPadre=object[0].getAttribute("data-urlimg");
        var identCategoriaPadre=param4;
        var raizCategoriaPadre=null;
        var padre=[nombreCategoriaPadre,imagenCategoriaPadre,identCategoriaPadre,raizCategoriaPadre];
        var hijo=[param,param2,param3,param4];
        //$(".current_navigation_ul").append('<li class="current_Category_spacer">&#187;</li>');
        $(".current_navigation_ul").append('<li><span class="current_Category_spacer">&nbsp;&#187;</span>&nbsp;<a id="actual_Categoria" class="current_Category"  href="#" >'+nombreCategoriaPadre+'</a></li>');
        var ctgry=param.replace('"','');
        var ctgry=ctgry.replace('"','');
        //$(".current_navigation_ul").append('<li class="current_Category_spacer">&#187;</li>');
        $(".current_navigation_ul").append('<li><span class="current_Category_spacer">&nbsp;&#187;</span>&nbsp;<a id="actual_subCategoria" class="current_subCategory" href="#">'+ctgry+'</a></li>');
        console.log(ctgry);
        $("#actual_Categoria").click(function(event){
           
            event.preventDefault();
            control_contenidoCategorias(nombreCategoriaPadre,imagenCategoriaPadre,identCategoriaPadre,raizCategoriaPadre);
            return false;
            
        });
        $("#actual_subCategoria").click(function(event){
           
            event.preventDefault();
            control_contenidoCategorias(param,param2,param3,param4);
            return false;
            
        });

    }
    
    
}

function funciones_fetchPopulares(param){
   
    //data: {status: status, name: name},
    
    $.ajax({
        url:"json/getPopulares.php",
        method:"POST",
        dataType: "json",
        data: {"categoria":param},
        success: function(result){
            
            if(result!="sin resultados"){funciones_cargarPopulares(result);}
        
            
        }
                
    });
    
    
}

function funciones_cargarPopulares(param){

    $.each(param,function(key,value){
        var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
        var thumbnail='<div class="thumbnail">';
        var img=' <img src="'+value["url_Img"]+'" alt="">';
        var caption='<div class="caption">';
        var h4='<h4 class="pull-right">'+value["precio"]+'€</h4>';
        var h4dos='<h4><a href="#">'+value["nombre"]+'</a></h4>';
        var cierreDiv='</div>';
        var ratings ='<div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div>';
        var cierreThumbnail='</div>';
        var cierredivol='</div>';
        
        var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+cierreDiv+ratings;
        $(".populares").append(elementoCompleto);

    });
}

function funciones_fetchMasVendidos(param){
   
    //data: {status: status, name: name},
    
    $.ajax({
        url:"json/getMasVendidos.php",
        method:"POST",
        data: {"categoria":param},
        success: function(result){
            
            if(result!="sin resultados"){
                //var n=JSON.parse(result);
                //funciones_cargarMasVendidos(n);
            }
            
        }
                
    });
    
    
}

function funciones_cargarMasVendidos(param){

    $.each(param,function(key,value){
        var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
        var thumbnail='<div class="thumbnail">';
        var img=' <img src="'+value["url_Img"]+'" alt="">';
        var caption='<div class="caption">';
        var h4='<h4 class="pull-right">'+value["precio"]+'€</h4>';
        var h4dos='<h4><a href="#">'+value["nombre"]+'</a></h4>';
        var cierreDiv='</div>';
        var ratings ='<div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div>';
        var cierreThumbnail='</div>';
        var cierredivol='</div>';
        
        var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+cierreDiv+ratings;
        $(".masVendidos").append(elementoCompleto);

    });
}

function funciones_fetchArticulosxCategoria(categoria,orden){
   
    //data: {status: status, name: name},
    $.ajax({
        url:"json/getArticulosxCategoria.php",
        method:"POST",
        data: {"categoria":categoria,"orden":orden},
        beforeSend: function(){
        control_popUpProcesando("abrir");
        },
        success: function(result){
            
            control_popUpProcesando("cerrar");
            if(result=="sin resultados"){
                funciones_cargarArticulosxCategoria(result); 
            }else{
                var n=JSON.parse(result);
                funciones_cargarArticulosxCategoria(n);
            }        
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        }
                
    });
    
    
}

function funciones_cargarArticulosxCategoria(param){
    
    if(param=="sin resultados"){
        //$("main").empty();
        $("main").append("<div class='col-md-12 categoria_vacia'><h3><i class='fa fa-exclamation-triangle fa-2x' aria-hidden='true'></i> &nbsp;No hay articulos en esta categoría</h3></div>");
    }else{
    
        $.each(param,function(key,value){

            var elc="#art"+key;
            var comparelc="#compareArt"+key;
            var carritolc="#addArtCarrito-"+key;
            var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_visitado"],value["categoria"],value["disponiblidad"],value["puntuacion"],value["veces_puntuado"],value["url_video"],value["disponibilidad"],value["inventario"]];
            var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
            var thumbnail='<div class="thumbnail">';
            var img=' <img class="miniaturaArticulos" src="'+value["url_Img"]+'" alt="">';
            var caption='<div class="caption">';
            var h4='<div class="col-md-12 captionPrecio"><h4>'+value["precio"]+'€</h4></div><br>';
            var h4dos='<div class="col-md-12 contNombreArticulo"><p class="nombreArticulo">'+value["nombre"]+'</p></div>';
            var cierreDiv='</div>';
            var pm=value["puntuacion"];
            pm=Math.round(pm);
            var estrellas_completas=pm-(pm%1);
            var iteracioni=0;
            var htmlEstrellas="";
            if(estrellas_completas>0){
                for (iteracioni=0;iteracioni<estrellas_completas;iteracioni++){
                    htmlEstrellas+='<i class="fa fa-star" aria-hidden="true"></i>';
                }
            }else{
                htmlEstrellas="Sin puntuación";
            }
            var ratings ='<div class="ratings"><p class="pull-right">'+value["numComentarios"]+' comentarios</p><p>'+htmlEstrellas+'</p></div>';
            var rtngs=value["numComentarios"]+' comentarios';
            var priceeur=value["precio"]+"€";
            var comparedata=[value["ident"],value["url_Img_Display"],value["nombre"],priceeur,value["descripcion"],rtngs,htmlEstrellas];
            var opciones='<div class="opciones_previewArticulo"><div class="opcion_previewArticulo" id="'+"art"+key+'"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></div><div class="opcion_previewArticulo" id="addArtCarrito-'+key+'"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i></div><div class="opcion_previewArticulo opcion_compararArticuloPreview" id="'+"compareArt"+key+'"><i class="fa fa-list-alt fa-2x" aria-hidden="true"></i></div></div>';
            var cierreThumbnail='</div>';
            var cierredivol='</div>';
            
            var elementoCompleto=divcol+thumbnail+img+caption+h4dos+h4+cierreDiv+ratings+opciones+cierreThumbnail+cierredivol;
            $(".display_ArticulosxCategoria").append(elementoCompleto);
            

            $(elc).click(function(event){
                event.preventDefault();
                control_cargarArticulo(send);
                return false;
            });
             $(comparelc).click(function(event){
                event.preventDefault();
                control_addCompararArticulo(comparedata);
                return false;
            });
            
            if(value["disponibilidad"]>0 && value["inventario"]>0){
                $(carritolc).click(function(event){
                    event.preventDefault();
                    control_addArticuloCarrito(comparedata);
                    return false;
                });    
            }else{
               $(carritolc).addClass("sinStock"); 
               $(carritolc).html("Sin Stock"); 
            }
            

        });
        
    }
}

function funciones_cargarArticulo(param){
    console.log(param);
    $("main").load("includes/display_articulo.php",{'data[]': param});
    document.getElementById("main").scrollIntoView();
    
    if($(".current_navigation_ul:last-child").hasClass("current_Item")){
     
             
        
    }else{
        
    
        $(".current_navigation_ul").append('<li><span class="current_Category_spacer">&nbsp;&#187;</span>&nbsp;<a class="current_Item" href="#">'+param[1]+'</a></li>');
                
    }
    
    
}

function funciones_cargarDetallesArticulo(param){
    
    $(".img-item_display").attr("src",param[3]);   
    $(".img-item_display").attr("alt","Imagen del artículo a 800x300");
    $("#articulo_item-Name").html(param[1]);
    $("#articulo_item-Price").html(param[4]+"€");
    $("#articulo_item-Description").html(param[5]);
    
    var pm=param[9];
    pm=Math.round(pm);
    var estrellas_completas=pm-(pm%1);
    var iteracioni=0;
    var htmlEstrellas="";
    if(estrellas_completas>0){
        for (iteracioni=0;iteracioni<estrellas_completas;iteracioni++){
            htmlEstrellas+='<i class="fa fa-star" aria-hidden="true"></i>';
        }
    }else{
        htmlEstrellas="Sin puntuación";
    }
    $("#articulo_item-numRatings").html(param[10]+" comentarios");
    $("#articulo_item-Ratings").html(htmlEstrellas);
    
    //$("#articulo_item-Ratings").html(param[6]+" puntuaciones");
    $(".opciones_displayArticulo").attr("data-id",param[0]);
    if(param[11]!=null && param[11]!="null" && param[11]!="NULL" && param[11]!=""){
        var iframe='<div class=" youtube"><iframe width="560" height="315" src="'+param[11]+'" frameborder="0" allowfullscreen></iframe></div></div>';
        $(".opciones_compartirDisplay").append(iframe);
        $("#reviews_container").addClass("permitirYT");
    }
    if(param[12]<1 || param[13]<1){
        $(".opcion_añadirArticuloCarrito").attr("data-disponibilidad",0);
    }
//    var contYT='<div class="opciones_compartirDisplay col-md-4 col-md-push-3">             </div>';
//    $(".opciones_displayArticulo").append(contYT);
   
    control_fetchReviewsArticulo(param[0]);
    
}

function funciones_fetchReviewsArticulo(articulo){
    
    //ajax for ratings
    $.ajax({
        url:"json/getReviewsArticulo.php",
        method:"POST",
        beforeSend:function(){
          funciones_popUpProcesando("abrir");   
        },
        data: {"ident":articulo},
        success: function(result){
            funciones_popUpProcesando("cerrar"); 
            if(result=="sin reviews"){
                control_rellenarReviewsArticulo(result);
            }else{
                var n=JSON.parse(result);
                control_rellenarReviewsArticulo(n);
            }

        }
                
    });
    
}

function funciones_rellenarReviewsArticulo(reviews){
    
    $("#reviews_container").find("row").remove();
    //REVIEWS
    if(reviews=="sin reviews"){
        $("#reviews_container").append("<h3 class='reviewsVacio'>No hay ningún comentario, sé tu el primero en dejar uno!</h3>");
    }else{
       $.each(reviews,function(key,value){


           var row='<div class="row">';
           var col='<div class="col-md-12" id="review-col-'+key+'"></div><hr>';
           var rowclose='</div>';
           $("#reviews_container").append(row+col+rowclose);
           $("#review-col-"+key).append('<div class="reviews_userdata"><p class="reviews_username">'+value["nombre"]+'<span class="pull-right">'+value["fecha"]+'</span></p></div>');
           //estrellas
               for(var it=0;it<value["puntuacion"];it++){
                   $("#review-col-"+key).append('<span class="estrellita"><i class="fa fa-star" aria-hidden="true"></i></span>');
               }
               for(var it=0;it<(5-value["puntuacion"]);it++){
                   $("#review-col-"+key).append('<span class="estrellita"><i class="fa fa-star-o" aria-hidden="true"></i></span>');
               }

           $("#review-col-"+key).append('<p>'+value["comentario"]+'</p>');


       });
    }

}

function funciones_toggleLeaveReview(){
    
    $(".leave_Review-target").slideToggle("slow");
    
}

function funciones_puntuarArticulo(puntuacion){

    $(".fa-star").removeClass("estrellaFija");
    var i=0;
    for(i=0;i<puntuacion;i++){
        $("#estrella-"+(i+1)).addClass("estrellaFija");
    }
    $(".leave_Review-submit").attr("data-valPuntuacion",puntuacion);
}

function funciones_dejarReview(contenido,puntuacion,ident){

    $.ajax({
        url:"json/enviarReview.php",
        method:"POST",
        beforeSend: function(){
          funciones_popUpProcesando("abrir");  
        },
        data:{"contenido":contenido,"puntuacion":puntuacion,"ident":ident},
        success: function(result){
            funciones_popUpProcesando("cerrar"); 
            if(result=="ok"){
               /*/*/
                $(".toggleReviewContainer").before("<h3>Gracias por su valoración!</h3>");
                $(".toggleReviewContainer").remove();
                $(".well").find(".row").remove();
                control_fetchReviewsArticulo(ident);
                  var randomn= Math.floor((Math.random() * 10000000) +999999);
                var random=randomn.toString();
                $(".well").before().append("<div class='col-md-12 display_none contCambiarDatos_correcto' id='"+random+"'><span class='cambiarDatos_correcto'>Valoración enviada con éxito! </span></div>");
                $("#"+random).fadeIn(1000);
                setTimeout(function(){$("#"+random).fadeToggle("slow");}, 3000);
                setTimeout(function(){$("#"+random).remove();}, 4000);
                 $(".reviewsVacio").remove();
            }
               
        }
    });
    
}

function funciones_comprobarVotoUsuario(articulo){
    $.ajax({
        url:"json/comprobarVotoUsuario.php",
        method:"POST",
        data:{"ident":articulo},
        success: function(result){
            if(result=="ya ha votado"){
                $(".toggleReviewContainer").before("<h3>Gracias por su valoración!</h3>");
                $(".toggleReviewContainer").remove();
            }
        }
    });
}
function funciones_cargarRegistro(){

    $("main").load("includes/registro.php");
    document.getElementById("main").scrollIntoView();
    
}

function funciones_cargarLogIn(){

    $("main").load("includes/logIn.php");
    document.getElementById("main").scrollIntoView();
    
}

function funciones_comprobarMailEnUso(param){

    $.ajax({
        url:"json/comprobarMailEnUso.php",
        method:"POST",
        data:{"data":param},
        success: function(result){
            if(result>0){
                $("#input_email").attr("data-error","Email ya en uso");
                control_cambiarIconoInput($("#input_email"),"error");
                $("#input_confirmarEmail").attr("data-error","Email ya en uso");
                control_cambiarIconoInput($("#input_confirmarEmail"),"error");
               
            }
        }
    });
    
}
function funciones_comprobarNuevoMailEnUso(param){

    $.ajax({
        url:"json/comprobarMailEnUso.php",
        method:"POST",
        data:{"data":param},
        success: function(result){
            if(result>0){
                $("#input_cambiarEmail").attr("data-error","Email ya en uso");
                control_cambiarIconoInput($("#input_cambiarEmail"),"error");
                $("#input_confirmarCambiarEmail").attr("data-error","Email ya en uso");
                control_cambiarIconoInput($("#input_confirmarCambiarEmail"),"error");
               
            }
        }
    });
    
}

function funciones_compruebaKeyPress(param,param2){
    

     var x = event.which || event.keyCode;
    
        if($(param2).attr("id")=="input_codigoPostal" || $(param2).attr("id")=="input_telefono"){
            var arraypermitidos=[48,49,50,51,52,53,54,55,56,57,8,9,27,13];
            param.preventDefault();
            var cont=$(param2).val();
            if($.inArray(x,arraypermitidos)==-1){
                //no es número ni delete ni suprimir ni nada permitido

            }else{
                
                if($(param2).attr("id")=="input_codigoPostal"){
                    
                    if(cont.length<5){
                        cont+=String.fromCharCode(x);
                        $(param2).val(cont);
                        if(cont.length>4){
                            //control_codigoPostal(param2);
                        }
                    }

                }else{
                    
                       if(cont.length<9){
                        cont+=String.fromCharCode(x);
                        $(param2).val(cont);
                    }
                }
                

            }
    }
    if(($(param2).attr("id")=="input_localidad") || ($(param2).attr("id")=="input_nombre") || ($(param2).attr("id")=="input_apellidos")){
        var arraypermitidos=[65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,32];
            param.preventDefault();
            var cont=$(param2).val();
            if($.inArray(x,arraypermitidos)==-1){
                //no es número ni delete ni suprimir ni nada permitido

            }else{
                if($(param2).attr("id")=="input_localidad"){
                    if(cont.length<50){
                        cont+=String.fromCharCode(x);
                        $(param2).val(cont);
                        if(cont.length>2){
                            $(param2).attr("data-error","");
                            control_cambiarIconoInput(param2,"desconocido");        
                        }else{
                            $(param2).attr("data-error","La localidad no puede tener menos de 3 letras");
                            control_cambiarIconoInput(param2,"error");        
                        }
                    }
                }else{
                    //nombre o apellidos
                    if(cont.length<$(param2).attr("maxlength")){
                        cont+=String.fromCharCode(x);
                        $(param2).val(cont);
                        
                        
                    }
                    
                }

            }
    }
}

function funciones_compruebaKeyUp(param,param2){
 /*
        var x = event.which || event.keyCode;
        if($(param2).attr("id")=="input_localidad"){

            if(x==8){
                if($(param2).val().length>2){

                }else{
                     $(param).attr("data-error","La localidad no puede tener menos de 3 letras");
                    control_cambiarIconoInput(param2,"error"); 
                }
            }
        }
    
   */ 
}

function funciones_comprobarCampo(param){

    $return="ini";
    if ($(param).attr("id")=="input_codigoPostal"){
        //nada que comprobar, autocomprobación mediante keypress
        $return="cp";
    }
    if ($(param).attr("id")=="input_nombre"){
        //nada que comprobar ya lo hacen keydown y pattern
        //suponemos que el valor va a ser siempre correcto así que lo darémos por correcto. Lo ponemos en carga mientras llega a control donde se pondrá en correcto.
        if($(param).val().length<3){
            $(param).attr("data-error","El nombre no puede tener menos de 3 letras");
            control_cambiarIconoInput(param,"error");
        }else{
            control_cambiarIconoInput(param,"cargando");
            $return="nombre";
        }
    }
    if ($(param).attr("id")=="input_apellidos"){
        //nada que comprobar ya lo hacen keydown y pattern
        //suponemos que el valor va a ser siempre correcto así que lo darémos por correcto. Lo ponemos en carga mientras llega a control donde se pondrá en correcto.
        if($(param).val().length<3){
            $(param).attr("data-error","Los apellidos no pueden tener menos de 3 letras");
            control_cambiarIconoInput(param,"error");
            
        }else{
            control_cambiarIconoInput(param,"cargando");
            $return="apellidos";
        }
    }
    if ($(param).attr("id")=="input_email"){
        
        //comparamos con la regexp del email
       var email = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        if(email.test($(param).val())){
            
            //si pasa la validación, si el campo confirmaremail está rellenado comprobar   
            if($("#input_confirmarEmail").val()==""){
                
                if($(param).val()==""){return false};
                //si está vacío no comprobamos, simplemente damos por válido
                control_cambiarIconoInput(param,"ok");
                
            }else{
            
                //comprobamos que el mail no esté usado
                
                    //si está rellenado y no está usado comprobamos que sean iguales
                    if($(param).val().toLowerCase()==$("#input_confirmarEmail").val().toLowerCase()){
                        control_cambiarIconoInput(param,"ok");
                        control_cambiarIconoInput($("#input_confirmarEmail"),"ok");

                    }else{
                        //si no coinciden los dos están mal
                        $(param).attr("data-error","Las direcciones introducidas no coinciden");
                        $("#input_confirmarEmail").attr("data-error","Las direcciones introducidas no coinciden");
                        control_cambiarIconoInput(param,"error");
                        control_cambiarIconoInput($("#input_confirmarEmail"),"error");
                    }
            }
            
            
        }else{
            
            //si no valida, paramos
            $(param).attr("data-error","Las direccion introducida no es valida");
            control_cambiarIconoInput(param,"error");
        }
        
        control_comprobarMailEnUso($(param).val());
        
    }
    if ($(param).attr("id")=="input_confirmarEmail"){
        
        if($(param).val()==""){return false};
        
        //si el email está vacío lo damos por incorrecto directamente
        if($("#input_email").val()==""){
            
            $(param).attr("data-error","Las direcciones introducidas no coinciden");
            control_cambiarIconoInput(param,"error");
            //en el span del error mostraríamos mensaje
            
        }else{
         
            //si está rellenado comprobamos que sean iguales
            if($("#input_email").val().toLowerCase()==$(param).val().toLowerCase()){
             
                //si los valores son iguales damos por válido
                var email = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                
                if(email.test($(param).val())){
                control_cambiarIconoInput(param,"ok");
                control_cambiarIconoInput($("#input_email"),"ok");
        
                }else{
                
                $(param).attr("data-error","Introduzca una direccion de email valida");
                $("#input_email").attr("data-error","La direccion de confirmacion no es una direccion valida");
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_email"),"error");
                
                    
                }
                
            }else{
             
                $("#input_email").attr("data-error","Las direcciones introducidas no coinciden");
                $(param).attr("data-error","Las direcciones introducidas no coinciden");
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_email"),"error");
               
            }   
        }
        control_comprobarMailEnUso($(param).val());
    }
    if($(param).attr("id")=="input_contrasenya"){
        
        if($("#input_confirmarContrasenya").val()==""){
            var pattern=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}/;;
            
            if(pattern.test($(param).val())){
               // alert("good");
                control_cambiarIconoInput(param,"ok");
            }else{
                $(param).attr("data-error","La contraseña debe contener al menos 1 Mayuscula, 1 Minúscula y 1 Número y como mínimo 6 caracteres, maximo 16");
                control_cambiarIconoInput(param,"error");
            }
            
        }else{
            
            var pattern=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}/;
            
            if(pattern.test($(param).val())){
               // alert("goodd");
                if($(param).val()==$("#input_confirmarContrasenya").val()){
                    control_cambiarIconoInput(param,"ok");
                    control_cambiarIconoInput($("#input_confirmarContrasenya"),"ok");
                }else{
                    $(param).attr("data-error","Las contraseñas no coinciden");
                   $("#input_confirmarContrasenya").attr("data-error","Las contraseñas no coinciden");
                    control_cambiarIconoInput(param,"error");
                    control_cambiarIconoInput($("#input_confirmarContrasenya"),"error");
                }
            }else{
                $(param).attr("data-error","La contraseña debe contener al menos 1 Mayuscula, 1 Minúscula y 1 Número y como mínimo 6 caracteres, maximo 16");
                control_cambiarIconoInput(param,"error");
            }
        }   
    }
    if($(param).attr("id")=="input_confirmarContrasenya"){
        
        
        if($("#input_contrasenya").val()==""){
            $(param).attr("data-error","Las contraseñas no coinciden");
            $("#input_contrasenya").attr("data-error","Las contraseñas no coinciden");
            control_cambiarIconoInput(param,"error");
            control_cambiarIconoInput($("#input_contrasenya"),"error");    
                       
        }else{
            
             if($("#input_contrasenya").val()==$(param).val()){
                 var pattern=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}/;
                 if(pattern.test($(param).val())){
                     control_cambiarIconoInput(param,"ok");
                     control_cambiarIconoInput($("#input_contrasenya"),"ok");
    
                 }else{
                     
                     $(param).attr("data-error","La contraseña debe contener al menos 1 Mayuscula, 1 Minúscula y 1 Número y como mínimo 6 caracteres, maximo 16");
                     control_cambiarIconoInput(param,"error");
                     
                 }
                 
             }else{
                 $(param).attr("data-error","Las contraseñas no coinciden");
                   $("#input_contrasenya").attr("data-error","Las contraseñas no coinciden");
                    control_cambiarIconoInput(param,"error");
                    control_cambiarIconoInput($("#input_contrasenya"),"error");   

             }            
        }
    }
    if ($(param).attr("id")=="input_localidad"){
     
        if($(param).val().length>=3){
            control_localidad($(param));
        }else{
            $(param).attr("data-error","La localidad no puede tener menos de 3 letras");
            control_cambiarIconoInput(param,"error");
            
        }
        
        
    }
    if ($(param).attr("id")=="input_telefono"){
        if($(param).val().length!=9){
            
            //incorrecto
            $(param).attr("data-error","Numero de telefono no valido");
            control_cambiarIconoInput(param,"error");
            
                    
        }else{
            
           $return="telefono";
            
        }
    }
    if ($(param).attr("id")=="input_direccion"){
     
        if($(param).val().length>3){
            
            $return="direccion";
            
        }else{
            $(param).attr("data-error","La dirección no puede tener menos de 4 caracteres");
             control_cambiarIconoInput(param,"error");
        }
        
    }
    if ($(param).attr("id")=="input_condiciones"){
        
        if(document.getElementById("input_condiciones").checked){
            $return="condiciones";
        }else{
            $(param).attr("data-error","Debe aceptar las condiciones");
            control_cambiarIconoInput(param,"error");
            
        }
        
    }
    if ($(param).attr("id")=="input_cambiarEmail"){
        if($(param).val()==$(param).attr("data-preVal")){
            //no ha cambiado la dirección de mail por lo que Okay no pasa nada
            if($("#input_confirmarCambiarEmail").val()==""){
                control_cambiarIconoInput(param,"desconocido");    
                control_cambiarIconoInput($("#input_confirmarCambiarEmail"),"desconocido");
            }
        }else{
                
             //comparamos con la regexp del email
       var email = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        if(email.test($(param).val())){
            
            //si pasa la validación, si el campo confirmaremail está rellenado comprobar   
            if($("#input_confirmarCambiarEmail").val()==""){
                
                if($(param).val()==""){
                };
                //si está vacío no comprobamos, simplemente damos por válido
                control_cambiarIconoInput(param,"ok");
                $("#input_confirmarCambiarEmail").attr("data-error","Por favor, confirme la nueva dirección de email");
                control_cambiarIconoInput($("#input_confirmarCambiarEmail"),"error");
                
                
            }else{
            
                //comprobamos que el mail no esté usado
                
                    //si está rellenado y no está usado comprobamos que sean iguales
                    if($(param).val().toLowerCase()==$("#input_confirmarCambiarEmail").val().toLowerCase()){
                        control_cambiarIconoInput(param,"ok");
                        control_cambiarIconoInput($("#input_confirmarCambiarEmail"),"ok");

                    }else{
                        //si no coinciden los dos están mal
                        $(param).attr("data-error","Las direcciones introducidas no coinciden");
                        $("#input_confirmarCambiarEmail").attr("data-error","Las direcciones introducidas no coinciden");
                        control_cambiarIconoInput(param,"error");
                        control_cambiarIconoInput($("#input_confirmarCambiarEmail"),"error");
                    }
            }
            
            
        }else{
            
            //si no valida, paramos
            $(param).attr("data-error","Las direccion introducida no es valida");
            control_cambiarIconoInput(param,"error");
        }
        
        control_comprobarNuevoMailEnUso($(param).val());

        }//FIN ELSE
 
    }//FIN  IF ID ==
    if ($(param).attr("id")=="input_confirmarCambiarEmail"){
        
        if(($(param).val()=="") && ($("#input_cambiarEmail").val()==$("#input_cambiarEmail").attr("data-preVal"))){
            $(param).attr("data-error","");
            control_cambiarIconoInput(param,"desconocido");
            $("#input_cambiarEmail").attr("data-error","");
            control_cambiarIconoInput("#input_cambiarEmail","desconocido");
            return false;
        }
        
        //si el email está vacío lo damos por incorrecto directamente
        if($("#input_cambiarEmail").val()==""){
            
            $(param).attr("data-error","Las direcciones introducidas no coinciden");
            control_cambiarIconoInput(param,"error");
            //en el span del error mostraríamos mensaje
            
        }else{
         
            //si está rellenado comprobamos que sean iguales
            if($("#input_cambiarEmail").val().toLowerCase()==$(param).val().toLowerCase()){
             
                //si los valores son iguales damos por válido
                var email = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                
                if(email.test($(param).val())){
                    
                    control_cambiarIconoInput($("#input_cambiarEmail"),"ok");
                    control_cambiarIconoInput(param,"ok");        
                }else{
                
                $(param).attr("data-error","Introduzca una direccion de email valida");
                $("#input_cambiarEmail").attr("data-error","La direccion de confirmacion no es una direccion valida");
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_cambiarEmail"),"error");
                
                    
                }
                
            }else{
             
                $("#input_cambiarEmail").attr("data-error","Las direcciones introducidas no coinciden");
                $(param).attr("data-error","Las direcciones introducidas no coinciden");
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_cambiarEmail"),"error");
               
            }   
        }//FIN ELSE
        control_comprobarNuevoMailEnUso($(param).val());
        
    }//FIN  IF ID ==
        
    if($(param).attr("id")=="input_cambiarContrasenya"){
        
        if($(param).val()==""){
            if($("#input_confirmarCambiarContrasenya").val()==""){
                $(param).attr("data-error","");
                control_cambiarIconoInput(param,"desconocido");
                $("#input_confirmarCambiarContrasenya").attr("data-error","");
                control_cambiarIconoInput($("#input_confirmarCambiarContrasenya"),"desconocido");
                return false;   
            }else{
                $(param).attr("data-error","Las contraseñas no coinciden");
                control_cambiarIconoInput(param,"error");
                $("#input_confirmarCambiarContrasenya").attr("data-error","Las contraseñas no coinciden");
                control_cambiarIconoInput($("#input_confirmarCambiarContrasenya"),"error");
            }
             
        }else{
            
            if($("#input_confirmarCambiarContrasenya").val()==""){
                var pattern=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}/;;

                if(pattern.test($(param).val())){
                   // alert("good");
                    control_cambiarIconoInput(param,"ok");
                    $("#input_confirmarCambiarContrasenya").attr("data-error","Las direcciones introducidas no coinciden");
                    control_cambiarIconoInput("#input_confirmarCambiarContrasenya","error");
                }else{
                    $(param).attr("data-error","La contraseña debe contener al menos 1 Mayuscula, 1 Minúscula y 1 Número y como mínimo 6 caracteres, maximo 16");
                    control_cambiarIconoInput(param,"error");
                }

            }else{

                var pattern=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}/;

                if(pattern.test($(param).val())){
                   // alert("good");
                    if($(param).val()==$("#input_confirmarCambiarContrasenya").val()){
                        control_cambiarIconoInput(param,"ok");
                        control_cambiarIconoInput($("#input_confirmarCambiarContrasenya"),"ok");
                    }else{
                        $(param).attr("data-error","Las contraseñas no coinciden");
                       $("#input_confirmarCambiarContrasenya").attr("data-error","Las contraseñas no coinciden");
                        control_cambiarIconoInput(param,"error");
                        control_cambiarIconoInput($("#input_confirmarCambiarContrasenya"),"error");
                    }
                }else{
                    $(param).attr("data-error","La contraseña debe contener al menos 1 Mayuscula, 1 Minúscula y 1 Número y como mínimo 6 caracteres, maximo 16");
                    control_cambiarIconoInput(param,"error");
                }
            }   
        }
    }//FIN IF ID==
    
    if($(param).attr("id")=="input_confirmarCambiarContrasenya"){
        
         if($(param).val()=="" && $("#input_cambiarContrasenya").val()==""){
             $(param).attr("data-error","");
            control_cambiarIconoInput(param,"desconocido");
             $("#input_cambiarContrasenya").attr("data-error","");
            control_cambiarIconoInput($("#input_cambiarContrasenya"),"desconocido");
            return false;
        }else{
            if($("#input_cambiarContrasenya").val()==""){
                $(param).attr("data-error","Las contraseñas no coinciden");
                $("#input_cambiarContrasenya").attr("data-error","Las contraseñas no coinciden");
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_cambiarContrasenya"),"error");    

            }else{

                 if($("#input_cambiarContrasenya").val()==$(param).val()){
                     var pattern=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}/;
                     if(pattern.test($(param).val())){
                         control_cambiarIconoInput(param,"ok");
                         control_cambiarIconoInput($("#input_cambiarContrasenya"),"ok");

                     }else{

                         $(param).attr("data-error","La contraseña debe contener al menos 1 Mayuscula, 1 Minúscula y 1 Número y como mínimo 6 caracteres, maximo 16");
                         control_cambiarIconoInput(param,"error");

                     }

                 }else{
                     $(param).attr("data-error","Las contraseñas no coinciden");
                       $("#input_cambiarContrasenya").attr("data-error","Las contraseñas no coinciden");
                        control_cambiarIconoInput(param,"error");
                        control_cambiarIconoInput($("#input_cambiarContrasenya"),"error");   

                 }            
            }
        }
    }//FIN IF ID==
    if($(param).attr("id")=="input_confirmarCambiarDatos"){
        
        if($(param).val()!=""){ 
            $(param).attr("data-error","");
            control_cambiarIconoInput(param,"desconocido");
        }
    
    }

    return($return);
}


function funciones_codigoPostal(param){
    
    var a=$("#input_codigoPostal").next().next().children(0);
    var b=$("#input_localidad").next().next().children(0);
    var v=[$(".form_signUp-localidad").val(),$(param).val()];
    
     $.ajax({
        url:"json/codigoPostal.php",
        method:"POST",
         data:{"nombreycp":v},
         beforeSend: function(){
             control_cambiarIconoInput(param,"cargando");
        },
        success: function(result){
            
            
            if(result=="Ok - querymod=0"){
                
                control_cambiarIconoInput(param,"ok");                
            }
            if(result=="Ok - querymod=1"){
                
                control_cambiarIconoInput(param,"ok");
                control_cambiarIconoInput($("#input_localidad"),"ok");
                
            }
            if(result=="Error 0"){
                
                $(param).attr("data-error","C.P incorrecto | No coincide con la localidad");
                control_cambiarIconoInput(param,"error");

            }
        }
    });
   
}


function funciones_localidad(param){

    var v=[$(param).val(),$("#input_codigoPostal").val()];
     $.ajax({
        url:"json/localidad.php",
        method:"POST",
         data:{"nombreycp":v},
         beforeSend: function(){
             control_cambiarIconoInput(param,"cargando");
        },
        success: function(result){
        
            if(result=="Error 0"){
                
                 $(param).attr("data-error","Nombre incorrecto | No coincide con el C.P");
                control_cambiarIconoInput(param,"error");
               
            }else{
                
                var p0=result.substring(1,result.length);
                
                var p1=p0.substring(0,p0.length-1);
                var parse=p1.split(" || ");
                if(parse[0]=="Ok - querymod=0"){

                    //cp correcto!
                    control_cambiarIconoInput(param,"ok");
                    $(param).val(parse[1]);

                }
                if(parse[0]=="Ok - querymod=1"){

                    control_cambiarIconoInput(param,"ok");
                    control_cambiarIconoInput($("#input_codigoPostal"),"ok");
                    $(param).val(parse[1]);

                }
            }
            
        }
    });
}

function funciones_cambiarIconoInput(param,param2){
    
    var obj=$(param).next().next().children(0);
   
    if(param2=="ok"){
        $(param).parent().find(".form_field-error").remove();
        $(param).attr("data-error","");
        $(obj).removeClass("fa-spinner");
        $(obj).removeClass("fa-spin");
        $(obj).removeClass("fa-fw");
        $(obj).removeClass("fa-exclamation-circle");
        $(obj).removeClass("fa-question-circle");
        $(obj).addClass("fa-check-circle-o");
        $(obj).css("color","green");
            
    }
    if(param2=="error"){
        $(param).parent().find(".form_field-error").remove();
        $(param).parent().append("<span class='form_field-error'>"+ $(param).attr("data-error")+"</span>");
        
           $(obj).removeClass("fa-spinner");
                $(obj).removeClass("fa-spin");
                $(obj).removeClass("fa-fw");
                $(obj).addClass("fa-exclamation-circle");
        $(obj).removeClass("fa-check-circle-o");
        $(obj).removeClass("fa-question-circle");
        $(obj).css("color","red");
            
    }
    if(param2=="vacio"){
        $(param).parent().find(".form_field-error").remove();
        $(param).parent().append("<span class='form_field-error'>"+ $(param).attr("data-error")+"</span>");
        
           $(obj).removeClass("fa-spinner");
                $(obj).removeClass("fa-spin");
                $(obj).removeClass("fa-fw");
                $(obj).addClass("fa-exclamation-circle");
        $(obj).removeClass("fa-check-circle-o");
        $(obj).removeClass("fa-question-circle");
        $(obj).css("color","red");
            
    }
    if(param2=="desconocido"){
        $(param).parent().find(".form_field-error").remove(); 
        $(obj).removeClass("fa-spinner");
        $(obj).removeClass("fa-spin");
        $(obj).removeClass("fa-fw");
        $(obj).removeClass("fa-exclamation-circle");
        $(obj).removeClass("fa-check-circle-o");
        $(obj).removeClass("fa-question-circle");
        $(obj).addClass("fa-question-circle");
        $(obj).css("color","grey");
        
    }
    if(param2=="cargando"){
          $(obj).addClass("fa-spinner");
                $(obj).addClass("fa-spin");
                $(obj).addClass("fa-fw");
                $(obj).removeClass("fa-exclamation-circle");
        $(obj).removeClass("fa-check-circle-o");
        $(obj).removeClass("fa-question-circle");
        $(obj).css("color","grey");
     
    }
}

function funciones_compruebaFormRegistro(evento,form){
   
    evento.preventDefault();
    var procede=true;
    var valores=[];
    var hijos=$(form).children();
    $.each(hijos,function(key,value){
        if($(value).hasClass("form_label-input-container")){
            valores.push($(value).find("input").val());
            var c=$(value).find(".form_campo_ayuda").children(0).hasClass("fa-check-circle-o");
            if(!c){
                var error="";
                procede=false;
                if($(value).find(".form_campo_ayuda").children(0).hasClass("fa-question-circle")){
                    if($(value).find("input").attr("type")!="checkbox"){
                        
                       error="Rellene este campo, por favor"; 
                        
                    }else{
                       if($(value).find("input").attr("id")=="input_condiciones"){
                            error="Debe aceptar las condiciones si quiere continuar";    
                        }   
                    }
                    $(value).find("input").attr("data-error",error);
                    control_cambiarIconoInput($(value).find("input"),"vacio");
                }
            }
        }
        
        
    });
    
   if(procede){
       return valores;
   }else{
        return procede;
   }
}

function funciones_compruebaFormAcceso(evento,form){
   
    evento.preventDefault();
    var email="";
    var pwd="";
    var campoemail;
    var campopwd;
    $.each(form,function(key,value){

        if($(value).attr("type")=="email"){
            email=$(value).val().toLowerCase();
            campoemail=value;
            $(campoemail).parent().find(".form_field-error").remove();

        }
        if($(value).attr("type")=="password"){
            pwd=$(value).val();
            campopwd=value;
            $(campopwd).parent().find(".form_field-error").remove();
        }
    });
    
    var data=[email,pwd];
    $.ajax({
        url:"json/accesoUsuario.php",
        method:"POST",
        data:{"data":data},
        beforeSend: function(){
        control_popUpProcesando("abrir");
        },
        success: function(result){
            control_popUpProcesando("cerrar");       
            if(result=="ok"){
                //fetch datos usuario local storage    
                //redirige
                window.location.assign("index.php");
            }
            if(result=="mail no existe"){
                $(campoemail).attr("data-error","Email no existe");
                control_cambiarIconoInput($(campoemail),"error");
            }
            if(result=="no validado"){
                $(campoemail).attr("data-error","Dirección de email aún no validada.");
                control_cambiarIconoInput($(campoemail),"error");
            }
            if(result=="error datos"){
                $(campopwd).attr("data-error","Email y/o contraseña incorrectos");
                control_cambiarIconoInput($(campopwd),"error");
            }
            
            
        }
         
    });
    
}


function funciones_altaUsuario(param){
    
    $.ajax({
        url:"json/altaUsuario.php",
        method:"POST",
        data:{"data":param},
        beforeSend: function(){
        control_popUpProcesando("abrir");
        },
        success: function(result){
            control_popUpProcesando("cerrar");
            window.location.assign("index.php")
        }
    });
}

function funciones_logOut(){
    $.ajax({
        url:"json/logOut.php",
        method:"POST",
        beforeSend: function(){
        control_popUpProcesando("abrir");
        },
        success: function(result){
            control_popUpProcesando("cerrar");
            window.location.assign("index.php");
        }
    });
}

function funciones_cargarAreaUsuario(){
    $("main").load("includes/cuentaUsuario.php");
    document.getElementById("main").scrollIntoView();
}

function funciones_cargarDatosUsuario(param,param2){

    //$("main").load("includes/display_categoria.php",{'data[]': [param,param2,param3,param4]});
    $(".menusConfiguracion_subMenu").removeClass("menuActivo");
    $(param).parent().addClass("menuActivo");

    if(param2=="areaUsuarios_datosDirecciones.php") {
                //parse JSON y send
                $(".areaUsuarios_panelDatos").load("includes/"+param2);
    }
    
    if(param2=="areaUsuarios_datosPedidos.php") {
                //parse JSON y send
                $(".areaUsuarios_panelDatos").load("includes/"+param2);
    }
    
    if(param2=="areaUsuarios_datosPersonales.php") {
        $.ajax({
            url:"json/"+param2,
            method:"POST",
            beforeSend: function(){
            control_popUpProcesando("abrir");
            },
            success: function(result){
                control_popUpProcesando("cerrar");
                   //parse JSON y send
                    var n=JSON.parse(result);
                    $(".areaUsuarios_panelDatos").load("includes/"+param2,{'data': n});
            }
        });
    }
}

function funciones_comprobarFormDatosPersonales(evento,form){
    evento.preventDefault();
    var procede=true;
    var cambio=false;
    var valores=[];
    var hijos=$(form).children();
    
    //comprobamos si hay algún error
    $.each(hijos,function(key,value){
        if($(value).hasClass("form_label-input-container")){
            
            var c=$(value).find(".form_campo_ayuda").children(0).hasClass("fa-exclamation-circle");
            if(c){
                procede=false;
                return false;
            }else{
                var d=$(value).find("input");
                if($(d).attr("id")!="input_nombre" && $(d).attr("id")!="input_apellidos"){
                    if($(d).val()!=$(d).attr("data-preVal")){
                        var e=[$(d).attr("id"),$(d).val()];
                        valores.push(e);
                        cambio=true;
                    }   
                }
            }
        }
        
        
    });

    if(procede==true){
       
        if(cambio==true){

            if($("#input_confirmarCambiarDatos").val()==""){
                
                $("#input_confirmarCambiarDatos").attr("data-error"," * Debes introducir tu contraseña para guardar los cambios");
                control_cambiarIconoInput($("#input_confirmarCambiarDatos"),"error");          
                
            }else{
                
                 $("#input_confirmarCambiarDatos").attr("data-error","");
                control_cambiarIconoInput($("#input_confirmarCambiarDatos"),"ok");   
                var e=["emailActual",$("#input_cambiarEmail").attr("data-preVal")];
                valores.push(e);    
                $.ajax({
                        url:"json/actualizarDatosPersonales.php",
                        method:"POST",
                        data:{"data":valores},
                        beforeSend: function(){
                        control_popUpProcesando("abrir");
                        },
                        success: function(result){
                            control_popUpProcesando("cerrar");
                            if(result=="ok"){
 control_cargarDatosUsuario($(".config_datosPersonales").children(0),"areaUsuarios_datosPersonales.php");
                                
                            $(".areaUsuarios_panelMenus").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Datos Actualizados correctamente </span></div>");
                                //$(".cambiarDatos_correcto").css("visibility","hidden");

                            $(".contCambiarDatos_correcto").fadeIn(1000);
                            setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
                            }
                            if(result=="!pwd"){
                                $("#input_confirmarCambiarDatos").attr("data-error"," Contraseña Incorrecta!");
                                control_cambiarIconoInput($("#input_confirmarCambiarDatos"),"error");
                                
                            }else{
                                  
                            }
                            

                        }
                    });   
            }    
        }else{
           return false;
        }
    }
    
}

function funciones_eliminarDireccion(param){
  $.ajax({
        url:"json/eliminarDireccion.php",
        method:"POST",
        data:{"data":param},
        success: function(result){
            if(result=="ok"){
                control_cargarDatosUsuario($(".config_datosDirecciones").children(0),"areaUsuarios_datosDirecciones.php");
            }
        }
    });
}



function funciones_cargarEditarDireccion(numero){
    $(".contFormsDireccion").load("includes/editarDireccion.php",function(){funciones_editarDireccion(numero);
                                                                           });
}

function funciones_editarDireccion(param){
    $("#form_editarDireccion").parent().parent().fadeOut(300);
    $("#form_editarDireccion").parent().parent().fadeIn(800);
    $("#form_editarDireccion").css({"opacity":1});
    var vals=$(".contDir-"+param).find(".contDir_value");
    $("#form_editarDireccion").find("#input_codigoPostal").val($(vals[0]).html());
    $("#form_editarDireccion").find("#input_codigoPostal").attr("data-preVal",$(vals[0]).html());
    //asumimos que es correcto y lo damos por valido 
    control_cambiarIconoInput($("#input_codigoPostal"),"ok");
    $("#form_editarDireccion").find("#input_localidad").val($(vals[1]).html());
    $("#form_editarDireccion").find("#input_localidad").attr("data-preVal",$(vals[1]).html());
    control_cambiarIconoInput($("#input_localidad"),"ok");
    $("#form_editarDireccion").find("#input_direccion").val($(vals[2]).html());
    $("#form_editarDireccion").find("#input_direccion").attr("data-preVal",$(vals[2]).html());
    control_cambiarIconoInput($("#input_direccion"),"ok");
    $("#form_editarDireccion").find("#input_telefono").val($(vals[3]).html());
    $("#form_editarDireccion").find("#input_telefono").attr("data-preVal",$(vals[3]).html());
    control_cambiarIconoInput($("#input_telefono"),"ok");
    $("#form_editarDireccion").find("#input_nombre").val($(".contDir-"+param).find("h5").html());
    $("#form_editarDireccion").find("#input_nombre").attr("data-preVal",$(".contDir-"+param).find("h5").html());
    control_cambiarIconoInput($("#input_nombre"),"ok");
}

function funciones_comprobarEditarDireccion(evento,form){
    
    evento.preventDefault();
    var procede=true;
    var cambio=false;
    var valores=[];
    var hijos=$(form).children();
    
    //comprobamos si hay algún error
    $.each(hijos,function(key,value){
        if($(value).hasClass("form_label-input-container")){
            
            var c=$(value).find(".form_campo_ayuda").children(0).hasClass("fa-exclamation-circle");
            if(c){
                procede=false;
                return false;
            }else{
                var d=$(value).find("input");
                var e=[$(d).attr("data-preVal"),$(d).val()];
                valores.push(e);
                cambio=true;
            }
        }
        
        
    });
    
     if(procede==true){
           $.ajax({
                url:"json/actualizarDatosDireccion.php",
                method:"POST",
                data:{"data":valores},
                success: function(result){
                    if(result=="ok"){
                         $(".areaUsuarios_panelMenus").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Datos Actualizados correctamente </span></div>");
                                //$(".cambiarDatos_correcto").css("visibility","hidden");

                            $(".contCambiarDatos_correcto").fadeIn(1000);
                            setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
                    }
                }
            });
     }
}

function funciones_addDireccion(){
   $(".contFormsDireccion").load("includes/addDireccion.php",function(){ $("#form_addDireccion").parent().parent().fadeOut(300);
    $("#form_addDireccion").parent().parent().fadeIn(800);
    document.getElementById("form_addDireccion").scrollIntoView();                                                                    
    });
}

function funciones_comprobarEditarDireccion(evento,form){
    
    evento.preventDefault();
    var procede=true;
    var cambio=false;
    var valores=[];
    var hijos=$(form).children();
    
    //comprobamos si hay algún error
    $.each(hijos,function(key,value){
        if($(value).hasClass("form_label-input-container")){
            
            var c=$(value).find(".form_campo_ayuda").children(0).hasClass("fa-exclamation-circle");
            if(c){
                procede=false;
                return false;
            }else{
                var d=$(value).find("input");
                var e=[$(d).attr("data-preVal"),$(d).val()];
                valores.push(e);
                cambio=true;
            }
        }
        
        
    });
    
     if(procede==true){
           $.ajax({
                url:"json/actualizarDatosDireccion.php",
                method:"POST",
                data:{"data":valores},
                success: function(result){
                    if(result=="ok"){
                        control_cargarDatosUsuario($(".config_datosDirecciones").children(0),"areaUsuarios_datosDirecciones.php");
                         $(".areaUsuarios_panelMenus").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Dirección actualizada correctamente </span></div>");
                                //$(".cambiarDatos_correcto").css("visibility","hidden");

                            $(".contCambiarDatos_correcto").fadeIn(1000);
                            setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
                        
                    }
                }
            });
     }
}

function funciones_comprobarAddDireccion(evento,form){
    
    evento.preventDefault();
    var procede=true;
    var cambio=false;
    var valores=[];
    var hijos=$(form).children();
    
    //comprobamos si hay algún error
    $.each(hijos,function(key,value){
        if($(value).hasClass("form_label-input-container")){
            
            var c=$(value).find(".form_campo_ayuda").children(0).hasClass("fa-exclamation-circle");
            if(c){
                procede=false;
                return false;
            }else{
                var c2=$(value).find(".form_campo_ayuda").children(0).hasClass("fa-question-circle");
                if(c2){
                    procede=false;
                     $(value).find("input").attr("data-error","Por favor, rellene este campo");
                    control_cambiarIconoInput($(value).find("input"),"vacio");
                }else{
                    var d=$(value).find("input");
                    var e=[$(d).attr("id"),$(d).val()];
                    valores.push(e);
                }
                
            }
        }
        
        
    });
    
     if(procede==true){
           $.ajax({
                url:"json/addDireccion.php",
                method:"POST",
                data:{"data":valores},
                success: function(result){
                    if(result=="ok"){
                        control_cargarDatosUsuario($(".config_datosDirecciones").children(0),"areaUsuarios_datosDirecciones.php");
                        $(".areaUsuarios_panelMenus").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Dirección añadida correctamente </span></div>");
                        $(".contCambiarDatos_correcto").fadeIn(1000);
                        setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
                        
                    }
                }
            });
     }
}

function funciones_addCompararArticulo(articulo){
    var ident="cArt-"+articulo[0];
    var selectident="#"+ident;
    if($(selectident).length == 0) {
        var a = document.getElementsByClassName("dataCompArticulo");
        if(a.length<3){
            control_restaurar("compararArticulos");

            var selectident2="#999";

            $(".contenedor_compararArticulos").fadeIn(300);
            $(".contCompararArticulos").append('<div class="dataCompArticulo" id='+ident+'></div>');
            $(selectident).append('<span class="col-md-12"><i class="eliminarArticuloComparacion fa fa-times fa-2x" aria-hidden="true" onclick=control_eliminarArticuloComparacion(this,'+articulo[0]+')></i></span>');
            $(selectident).append("<span class='cArtm'><h4>"+articulo[2]+"</h4><img src='"+articulo[1]+"' alt='"+articulo[2]+"'></span>");
            var randomn= Math.floor((Math.random() * 10000000) +999999);
            var random=randomn.toString();     
            $(".contCompararArticulos").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto' id='"+random+"'><span class='cambiarDatos_correcto'>Producto añadido correctamente </span></div>");
            $("#"+random).fadeIn(300);
            setTimeout(function(){$("#"+random).fadeToggle("slow");}, 2000);
            setTimeout(function(){$("#"+random).remove();}, 3000);
            sessionStorage.setItem("compararArticulos-"+articulo[0],JSON.stringify(articulo));
            if(!sessionStorage.getItem("articulosComparacion")){
                var s=articulo[0]+"|"
                sessionStorage.setItem("articulosComparacion",s);
            }else{
                var cnt=sessionStorage.getItem("articulosComparacion");
                var idntarticulos=cnt+articulo[0]+"|";
                sessionStorage.setItem("articulosComparacion",idntarticulos);
            }    


        }else{
            var randomn= Math.floor((Math.random() * 10000000) +999999);
            var random=randomn.toString();
          $(".contCompararArticulos").after().append("<div class='col-md-12 display_none contCambiarDatos_incorrecto' id='"+random+"'><span class='cambiarDatos_incorrecto'>Límite de 3 productos superado </span></div>");
            $("#"+random).fadeIn(1000);
             setTimeout(function(){$("#"+random).fadeToggle("slow");}, 3000);
             setTimeout(function(){$("#"+random).remove();}, 4000);

        }
    }else {
        var randomn= Math.floor((Math.random() * 10000000) +999999);
        var random=randomn.toString();
            $(".contCompararArticulos").after().append("<div class='col-md-12 display_none contCambiarDatos_incorrecto' id='"+random+"'><span class='cambiarDatos_incorrecto'>Articulo ya en lista</span></div>");
            $("#"+random).fadeIn(1000);
             setTimeout(function(){$("#"+random).fadeToggle("slow");}, 3000);
             setTimeout(function(){$("#"+random).remove();}, 4000);
    }
}

function funciones_eliminarArticuloComparacion(elemento,item){
      $(elemento).parent().parent().remove();
            sessionStorage.removeItem("compararArticulos-"+item);
            var cnt=sessionStorage.getItem("articulosComparacion");
            var idntarticulos=cnt.replace(item+"|","");
            sessionStorage.setItem("articulosComparacion",idntarticulos);
            var aprima = document.getElementsByClassName("dataCompArticulo");
            if(aprima.length==0){
                control_cerrar("compararArticulos");
            }
}
function funciones_compararArticulos(){
    var mywindow=window.open("comparar.php");
}
function funciones_actualizarCarrito(){
        $(".carritoCompra_info").empty();
       if(localStorage.getItem("numArticulosCarrito")){
        //$(".contendor_compra").append();
        var n=localStorage.getItem("numArticulosCarrito");
        var d=localStorage.getItem("dineroTotalCarrito");
        $(".carritoCompra_info").append("<span class='preview_nItemsCarrito'>"+n+"</span>&nbsp;items&nbsp;|&nbsp;<span class='preview_totalDineroCarrito'>"+d+"</span>&nbsp;€");
    }else{
        $(".carritoCompra_info").append("<span class='preview_nItemsCarrito'>0</span>&nbsp;items&nbsp;|&nbsp;<span class='preview_totalDineroCarrito'>0.00</span>&nbsp;€");
    }
}
function funciones_addArticuloCarrito(data){

    $.ajax({
        url:"json/getMaxInventarioItem.php",
        method:"POST",
        data:{articulos:data[0]},
        success: function(result){
            var anyade=true;
            if(localStorage.getItem("carritoCompra")!=null){
                  var a=[];
                a=JSON.parse(localStorage.getItem('carritoCompra'));    

                //buscamos si el articulo ya ha sido incluido
                var iterador=0;
                var encontrado=false;
                var iEncontrada=-1;
                var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
                while(iterador<fin && !encontrado){
                    if(a[iterador][0]==data[0]){
                        encontrado=true;
                        if(parseInt(result)>=parseInt(a[iterador][7])+1){    
                            a[iterador][7]+=1;
                            localStorage.setItem("carritoCompra",JSON.stringify(a));
                            var nAC=parseInt(localStorage.getItem("numArticulosCarrito"));
                            nAC+=1;
                            var dTC=parseFloat(localStorage.getItem("dineroTotalCarrito"));
                            dTC+=parseFloat(data[3]);
                            localStorage.setItem("numArticulosCarrito",nAC);
                            localStorage.setItem("dineroTotalCarrito",dTC);
                        }else{
                            anyade=false;
                        }
                        
                    }
                    iterador++;
                }
                if(encontrado==false){
                    data.push(1);
                    a.push(data);
                    localStorage.setItem("carritoCompra",JSON.stringify(a));
                    var nAC=parseInt(localStorage.getItem("numArticulosCarrito"));
                    nAC+=1;
                    var dTC=parseFloat(localStorage.getItem("dineroTotalCarrito"));
                    dTC+=parseFloat(data[3]);
                    localStorage.setItem("numArticulosCarrito",nAC);
                    localStorage.setItem("dineroTotalCarrito",dTC);
                }else{

                }


            }else{
                var a=[];
                data.push(1);
                a.push(data);
                localStorage.setItem("carritoCompra",JSON.stringify(a));
                localStorage.setItem("numArticulosCarrito",1);
                localStorage.setItem("dineroTotalCarrito",parseFloat(data[3]));
            }

            control_actualizarCarrito();
            $(".contCambiarDatos_correcto").remove();
            if(anyade == true){
                 $(".main_nav").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Añadido a la cesta</span></div>");
            }else{
                 $(".main_nav").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Máximo en Stock</span></div>");
            }
            //$(".main_nav").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto' id='"+random+"'><span class='cambiarDatos_correcto'>Añadido a la cesta</span></div>");
            $(".contCambiarDatos_correcto").fadeIn(1000);
            setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
            setTimeout(function(){$(".contCambiarDatos_correcto").remove();}, 5000);
        }
    });
}

function funciones_cargarDetallesCarrito(){
    $("main").load("includes/carrito.php");
}

function funciones_eliminarArticuloCarrito(elemento,articulo){
   
  var nnn=document.getElementsByClassName("detallesArticuloCarrito");
  
    
    if(nnn.length-1<=0){
        control_vaciarCestaCompra();
    } else{
        var a=[];
        a=JSON.parse(localStorage.getItem('carritoCompra'));

        var nAC=parseInt(localStorage.getItem("numArticulosCarrito"));
        var dTC=parseInt(localStorage.getItem("dineroTotalCarrito"));
        var iterador=0;
        var encontrado=false;
        var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
        while(iterador<fin && !encontrado){
            
            if(a[iterador][0]==articulo){
               
                nAC-=parseInt(a[iterador][7]);
                if(nAC<0){
                    nAC=0;
                }
                dTC-=parseFloat(a[iterador][7])*parseFloat(a[iterador][3]);
                if(dTC<0){
                    dTC=0;
                }
                a.splice(iterador,1);
                encontrado=true;
                
            }
            iterador++;
        }
        
        localStorage.setItem("numArticulosCarrito",nAC);
        localStorage.setItem("dineroTotalCarrito",dTC);
    }
     $(elemento).parent().fadeToggle("slow");
     setTimeout(function(){$(elemento).parent().remove();}, 1000);   
     control_actualizarCarrito();
}
    

function funciones_vaciarCestaCompra(){

        localStorage.removeItem("carritoCompra");
        localStorage.removeItem("identsCarrito");
        localStorage.removeItem("numArticulosCarrito");
        localStorage.removeItem("totalDineroCarrito");
        control_actualizarCarrito();
        $(".detallesArticuloCarrito").fadeOut(300);
        setTimeout(function(){
        $(".detallesArticuloCarrito").remove();

        $(".panelDatos_progresoCompra").load("includes/progresoCompraSession_cesta.php");
    },300);
}

function funciones_retrocederCompra(){
    
    var ths=$(".progresoCompra").find(".menuActivo");
    var m=$(ths).attr("id");
    var prev=$(".progresoCompra").find(".menuActivo").prev();
    $(ths).removeClass("menuActivo");
        $(prev).addClass("menuActivo");
    if(m=="confirmar_cestaDireccion"){
    
        $("#contProgresoCompra").children(0).fadeOut(300);   
        setTimeout(function(){          $("#contProgresoCompra").load("includes/progresoCompraSession_cesta.php");}, 400);
    }
    if(m=="confirmar_cestaEnvio"){
        $("#contProgresoCompra").children(0).fadeOut(300);   
        setTimeout(function(){          $("#contProgresoCompra").load("includes/progresoCompraSession_direccion.php");}, 400);
    }
    if(m=="confirmar_cestaPago"){
        $("#contProgresoCompra").children(0).fadeOut(300);   
        setTimeout(function(){      $("#contProgresoCompra").load("includes/progresoCompraSession_envio.php");}, 400);
    }
}
function funciones_avanzarCompra(){
    var ths=$(".progresoCompra").find(".menuActivo");
    var m=$(ths).attr("id");
    var next=$(".progresoCompra").find(".menuActivo").next();
    if(m=="confirmar_cestaCompra"){
        //creamos pedido temporal
        //creamos lineas pedido temporal
        $(ths).removeClass("menuActivo");
        $(next).addClass("menuActivo");
        //cargamos el contenido del siguiente paso
        $("#contProgresoCompra").children(0).fadeOut(300);   
        setTimeout(function(){ $("#contProgresoCompra").load("includes/progresoCompraSession_direccion.php");}, 400);
    }
    if(m=="confirmar_cestaDireccion"){
        var obj=$(".direccionActiva").parent().children();
        if(obj.length>0){
            var datos=[];
            var iteracion=0;
            datos.push($(obj).parent().attr("id"));
        
            for(iteracion=0;iteracion<obj.length;iteracion++){

                datos.push($(obj[iteracion]).html());
            }    
            sessionStorage.setItem("direccionEnvio",JSON.stringify(datos));
            $(ths).removeClass("menuActivo");
        $(next).addClass("menuActivo");
            $("#contProgresoCompra").children(0).fadeOut(300);   
        setTimeout(function(){
            $("#contProgresoCompra").load("includes/progresoCompraSession_envio.php");$("#contProgresoCompra").empty();}, 400);
        }
    }
    if(m=="confirmar_cestaEnvio"){
        var obj=$(".metodoEnvioActivo").parent().children();
        if(obj.length>0){
            var datos=[];
            var iteracion=0;
            for(iteracion=0;iteracion<obj.length;iteracion++){

                datos.push($(obj[iteracion]).html());
            }    
            
            sessionStorage.setItem("metodoEnvio",JSON.stringify(datos));
            $(ths).removeClass("menuActivo");
        $(next).addClass("menuActivo");
            $("#contProgresoCompra").children(0).fadeOut(300);   
        setTimeout(function(){
            $("#contProgresoCompra").load("includes/progresoCompraSession_pago.php");$("#contProgresoCompra").empty();}, 400);
        }
    }
    if(m==""){
        
    }
}

function funciones_fetchDirecciones(){
    $.ajax({
        url:"json/fetchDirecciones.php",
        method:"POST",
        beforeSend: function(){
            control_popUpProcesando("abrir");
        },
        success: function(result){
            control_popUpProcesando("cerrar");  
            if(result=="sin direcciones"){
                
            }else{
                
                var n=JSON.parse(result);
                
                $.each(n,function(key,value){
                    var aLi="<div id='"+value["ident"]+"' class='direccionEnvio'>";
                    var nombre="<span class='col-md-2'>"+value["nombre"]+"</span>";
                    var cp="<span class='col-md-2'>"+value["cp"]+"</span>";
                    var localidad="<span class='col-md-2'>"+value["localidad"]+"</span>";
                    var direccion="<span class='col-md-2'>"+value["direccion"]+"</span>";
                    var telefono="<span class='col-md-2'>"+value["telefono"]+"</span>";
                    var chosen="<span class='col-md-2 direccionTarget' onclick='control_seleccionarEnviarAqui(this)'>Enviar Aquí</span>";
                    var cLi="</div>";
                    var fLi=aLi+nombre+cp+localidad+direccion+telefono+chosen+cLi;
                    $("#listaDirecciones").append(fLi);
                });
            }
        }
    });
}

function funciones_seleccionarEnviarAqui(elemento){

    $(".direccionEnvio").find(".direccionTarget").removeClass("direccionActiva");
    $(".direccionEnvio").find(".direccionTarget").html("Enviar Aquí");
    $(elemento).addClass("direccionActiva");
    $(elemento).html("<i class='fa fa-check fa-2x' aria-hidden='true'></i>");
    if(($("#continuarCompra")).length>0){
        
    }else{
        $(".navegacionCompra").append('<a onclick="control_avanzarCompra();" id="continuarCompra" class="pull-right"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></a>');
    }

}


function funciones_cargarMetodosEnvio(){
        $.ajax({
        url:"json/fetchMetodosEnvio.php",
        method:"POST",
        success: function(result){
            
            var n=JSON.parse(result);
                
                $.each(n,function(key,value){
                    var aLi="<div id='"+value["ident"]+"' class='metodoEnvio col-md-12'>";
                    var nombre="<span class='col-md-2'>"+value["nombre"]+"</span>";
                    var descripcion="<span class='col-md-7'>"+value["descripcion"]+"</span>";
                    var precio="<span class='col-md-1'>+&nbsp;"+value["precio"]+"&nbsp;€</span>";
                    var chosen="<span class='col-md-2 metodoEnvioTarget' onclick='control_seleccionarMetodoEnvio(this)'>Elegir este</span>";
                    var cLi="</div>";
                    var fLi=aLi+nombre+descripcion+precio+chosen+cLi;
                     $("#listaMetodosEnvio").append(fLi);
                });
    
        }
    });
}

function funciones_seleccionarMetodoEnvio(elemento){

    $(".metodoEnvio").find(".metodoEnvioTarget").removeClass("metodoEnvioActivo");
    $(".metodoEnvio").find(".metodoEnvioTarget").html("Elegir este");
    $(elemento).addClass("metodoEnvioActivo");
    $(elemento).html("<i class='fa fa-check fa-2x' aria-hidden='true'></i>");
    if(($("#continuarCompra")).length>0){
        
    }else{
        $(".navegacionCompra").append('<a onclick="control_avanzarCompra();" id="continuarCompra" class="pull-right"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></a>');
    }
    var n=$(elemento).prev().html();
    var precio=n.split("&nbsp;");
    sessionStorage.setItem("gastosEnvio",precio[1]);

    
}

function funciones_completarPayPalForm(){
        if(localStorage.getItem("carritoCompra")!=null){
            
             var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
            
                var a=[];
                a=JSON.parse(localStorage.getItem('carritoCompra'));
                var iterador=0;
                var encontrado=false;
                var i=0;
                for(iterador=0;iterador<fin;iterador++){
                    var detallesArticulo=a[iterador];
                    var n=iterador+1;
                    var item_nombre_x='<input type="hidden" name="item_name_'+n+'" value="'+detallesArticulo[2]+'">';
                    var amount_x='<input type="hidden" name="amount_'+n+'" value='+parseFloat(detallesArticulo[3])+'>';
                    var quantity_x='<input type="hidden" name="quantity_'+n+'" value='+parseFloat(detallesArticulo[7])+'>';
                    $("#formPago").append(item_nombre_x+amount_x+quantity_x);
                }
                        
            
                var item_nombre_envio='<input type="hidden" name="item_name_'+(fin+1)+'" value="Gastos de Envio">';
                var amount_envio='<input type="hidden" name="amount_'+(fin+1)+'" value='+parseFloat(sessionStorage.getItem("gastosEnvio"))+'>';
            
                $("#formPago").append(item_nombre_envio);
                $("#formPago").append(amount_envio);
                $("#formPago").append('<input type="image" onclick="control_prePago(event);" id="imgSubmit" src="http://andreasinc.com/media/merchant/andreasinc/_ebay/TESTER/paypal-small.gif"  alt="PayPal - The safer, easier way to pay online">');
        
     }else{
    }
}

function funciones_visualizarCestaCompra(){
    
        if(localStorage.getItem("carritoCompra")!=null){
         var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
        if(fin>0){
        var a=[];
        a=JSON.parse(localStorage.getItem('carritoCompra'));
        var iterador=0;
        var encontrado=false;
        
            for(iterador=0;iterador<fin;iterador++){
                var detallesArticulo=a[iterador];
                var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
                var img="<div class='col-md-2'><img class='imgDetalleArticuloCarrito' src='"+detallesArticulo[1]+"'></div>";
                var nombre="<div class='col-md-3 detalleArticuloCarrito_texto'><h4>"+detallesArticulo[2]+"</h4></div>";
                var descripcion="<div class='col-md-3 detalleArticuloCarrito_texto'>"+detallesArticulo[4]+"</div>";
                var precio="<div class='col-md-1 detalleArticuloCarrito_numero'>"+detallesArticulo[3]+"</div>";
                var unidades="<div class='col-md-2 detalleArticuloCarrito_unidades detalleArticuloCarrito_numero'><span><i onclick='control_aumentarUnidades("+detallesArticulo[0]+",this);' class='fa fa-chevron-circle-up' aria-hidden='true'>&nbsp;</i><i onclick='control_disminuirUnidades("+detallesArticulo[0]+",this);' class='fa fa-chevron-circle-down' aria-hidden='true'>&nbsp;</i></span><span class='numUnidadesArticuloCarrito'>"+detallesArticulo[7]+"&nbsp;uds</span></div>";
                var eliminar="<div class='eliminarDelCarrito col-md-1' onclick='control_eliminarArticuloCarrito(this,"+parseInt(detallesArticulo[0])+");'><i class='fa fa-times fa-2x' aria-hidden='true'></i></div>";
                var cDiv="</div>"; $(".contDetallesCarrito").append(aDiv+nombre+img+descripcion+precio+unidades+eliminar+cDiv);
            }

        }else{
            var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
            var h3="<h3>La cesta está vacía!</h3>"
            var cDiv="</div>";
            $(".navegacionCompra").remove();    
            $(".contDetallesCarrito").append(aDiv+h3+cDiv);
        }
}else{
    
        var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
        var h3="<h3>La cesta está vacía!</h3>"
        var cDiv="</div>";
        $(".navegacionCompra").remove();    
        $(".contDetallesCarrito").append(aDiv+h3+cDiv);
    }
}

function funciones_visualizarCestaCompra(){
    
        if(localStorage.getItem("carritoCompra")!=null){
         var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
        if(fin>0){
        var a=[];
        a=JSON.parse(localStorage.getItem('carritoCompra'));
        var iterador=0;
        var encontrado=false;
        
            for(iterador=0;iterador<fin;iterador++){
                var detallesArticulo=a[iterador];
                var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
                var img="<div class='col-md-2'><img class='imgDetalleArticuloCarrito' src='"+detallesArticulo[1]+"'></div>";
                var nombre="<div class='col-md-3 detalleArticuloCarrito_texto'><h4>"+detallesArticulo[2]+"</h4></div>";
                var descripcion="<div class='col-md-3 detalleArticuloCarrito_texto'>"+detallesArticulo[4]+"</div>";
                var precio="<div class='col-md-1 detalleArticuloCarrito_numero'>"+detallesArticulo[3]+"</div>";
                var unidades="<div class='col-md-2 detalleArticuloCarrito_unidades detalleArticuloCarrito_numero'><span><i onclick='control_aumentarUnidades("+detallesArticulo[0]+",this);' class='fa fa-chevron-circle-up' aria-hidden='true'>&nbsp;</i><i onclick='control_disminuirUnidades("+detallesArticulo[0]+",this);' class='fa fa-chevron-circle-down' aria-hidden='true'>&nbsp;</i></span><span class='numUnidadesArticuloCarrito'>"+detallesArticulo[7]+"&nbsp;uds</span></div>";
                var eliminar="<div class='eliminarDelCarrito col-md-1' onclick='control_eliminarArticuloCarrito(this,"+parseInt(detallesArticulo[0])+");'><i class='fa fa-times fa-2x' aria-hidden='true'></i></div>";
                var cDiv="</div>"; $(".contDetallesCarrito").append(aDiv+nombre+img+descripcion+precio+unidades+eliminar+cDiv);
            }

        }else{
            var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
            var h3="<h3>La cesta está vacía!</h3>"
            var cDiv="</div>";
            $(".navegacionCompra").remove();    
            $(".contDetallesCarrito").append(aDiv+h3+cDiv);
        }
}else{
    
        var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
        var h3="<h3>La cesta está vacía!</h3>"
        var cDiv="</div>";
        $(".navegacionCompra").remove();    
        $(".contDetallesCarrito").append(aDiv+h3+cDiv);
    }
}

function funciones_visualizarDireccion(){
    
    var direccionEnvio=JSON.parse(sessionStorage.getItem("direccionEnvio"));
  
    var aLi="<div id='"+direccionEnvio[0]+"' class='direccionEnvio'>";
    var nombre="<span class='col-md-2'>"+direccionEnvio[1]+"</span>";
    var cp="<span class='col-md-2'>"+direccionEnvio[2]+"</span>";
    var localidad="<span class='col-md-3'>"+direccionEnvio[3]+"</span>";
    var direccion="<span class='col-md-3'>"+direccionEnvio[4]+"</span>";
    var telefono="<span class='col-md-2'>"+direccionEnvio[5]+"</span>";
    var cLi="</div>";
    var fLi=aLi+nombre+cp+localidad+direccion+telefono+cLi;
    $("#listaDirecciones").append(fLi);
}

function funciones_visualizarMetodoEnvio(){
     
    var metodoEnvio=JSON.parse(sessionStorage.getItem("metodoEnvio"));
    var gastosEnvio=sessionStorage.getItem("gastosEnvio");
    var aLi="<div class='metodoEnvio col-md-12'>";
    var nombre="<span class='col-md-2'>"+metodoEnvio[0]+"</span>";
    var descripcion="<span class='col-md-9'>"+metodoEnvio[1]+"</span>";
    var precio="<span class='col-md-1'>+&nbsp;"+gastosEnvio+"&nbsp;€</span>";
    var cLi="</div>";
    var fLi=aLi+nombre+descripcion+precio+cLi;
     $("#listaMetodosEnvio").append(fLi);
}

function funciones_aumentarUnidades(articulo,elemento){
    
    var c=$(elemento).parent().next().html();
    var cantidad=c.replace("&nbsp;uds","");
    var n=[articulo,parseInt(cantidad)+1];
    $.ajax({
        url:"json/getMaxInventarioItem.php",
        method:"POST",
        data:{articulos:articulo},
        success: function(result){
            if(result!="error"){
                var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
                if(fin>0){
                    var a=[];
                    a=JSON.parse(localStorage.getItem('carritoCompra'));
                    var dTC=parseFloat(localStorage.getItem("dineroTotalCarrito"));
                    var nAC=parseInt(localStorage.getItem("numArticulosCarrito"));
                    var iterador=0;
                    var encontrado=false;
                    while(iterador<fin && !encontrado){

                            if(a[iterador][0]==articulo){
                                if(parseInt(result)>=a[iterador][7]+1){
                                    a[iterador][7]++;
                                    dTC+=parseFloat(a[iterador][3]);
                                    $(elemento).parent().next().html(parseFloat(a[iterador][7])+"&nbsp;uds");
                                    localStorage.setItem("carritoCompra",JSON.stringify(a));
                                    nAC+=1;
                                    localStorage.setItem("numArticulosCarrito",nAC);
                                    localStorage.setItem("dineroTotalCarrito",dTC);
                                }else{
                                    $("#main > div.col-md-12.opcionesProgresoCompra > div").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Máximo en Stock</span></div>");
                                    $(".contCambiarDatos_correcto").fadeIn(1000);
                                    setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
                                    setTimeout(function(){$(".contCambiarDatos_correcto").remove();}, 5000);
                                }
                                
                                encontrado=true;
                            }
                            iterador++;
                        }
                        
                        control_actualizarCarrito();

                }
        }else{
             var c=$(elemento).parent().parent().before().append("Máximo en Stock");
        }
    }
    });
    
}

function funciones_disminuirUnidades(articulo,elemento){  
    
    var fin=JSON.parse(localStorage.getItem('carritoCompra')).length;
    if(fin>0){
    var a=[];
    a=JSON.parse(localStorage.getItem('carritoCompra'));
    var dTC=parseFloat(localStorage.getItem("dineroTotalCarrito"));
    var nAC=parseInt(localStorage.getItem("numArticulosCarrito"));
    var iterador=0;
    var encontrado=false;
    while(iterador<fin && !encontrado){
            
            if(a[iterador][0]==articulo){
                if(a[iterador][7]-1>0){
                    dTC-=parseFloat(a[iterador][3]);
                     nAC-=1;
                    a[iterador][7]--;
                }
                
                $(elemento).parent().next().html(parseFloat(a[iterador][7])+"&nbsp;uds");
                encontrado=true;
            }
            iterador++;
        }
        localStorage.setItem("carritoCompra",JSON.stringify(a));
        localStorage.setItem("numArticulosCarrito",nAC);
        localStorage.setItem("dineroTotalCarrito",dTC);
        control_actualizarCarrito();
        
    }
}

function funciones_prePago(){
    
    var a=[]; a=JSON.parse(localStorage.getItem('carritoCompra'));
    //generar pedido
    //actualizar inventario articulos
    $.ajax({
        url:"json/prePago.php",
        method:"POST",
        data:{articulos:a},
        success: function(result){
            if(result=="ok"){
                //procede con la compra
                control_postPago();
            }else{
                $("#main > div.col-md-12.opcionesProgresoCompra > div").before().append("<div id='erroresPrePago' class='col-md-12'></div>");
                $("#erroresPrePago").append("<h5>Oups! Parece que alguien se te ha adelantado llevándose las últimas unidades de los siguientes artículos:</h5>");
                $("#erroresPrePago").append("<ul>");
                var r=JSON.parse(result);
                for (var xx=0;xx<r.length;xx++){
                    $("#erroresPrePago").append("<li>"+r[xx][1]+" -- quedan "+r[xx][2]+" unidades</li>");
                }
                $("#erroresPrePago").append("</ul>");
            }
        }
    });
}

function funciones_crearPedido(){
        
    var a=[]; a=JSON.parse(localStorage.getItem('carritoCompra'));
    //generar pedido
    //actualizar inventario articulos
    $.ajax({
        url:"json/crearPedido.php",
        method:"POST",
        data:{articulos:a},
        success: function(result){
            
        }
    });
}
function funciones_submitForm(idForm){
    $(idForm).submit();
}

function funciones_cargarPedidos(pedidos){
    if(pedidos!="sin pedidos"){
        var arrayPedidos=[];
        for (var i=0;i<pedidos.length;i++){
            var div="<div class='col-md-12 datosPedido'>";
            var hijoIdent=""
            var estado="";
            if(pedidos[i]["estado"]==0){estado='Pendiente de Pago'}
            if(pedidos[i]["estado"]==1){estado='Pagado'}
            if(pedidos[i]["estado"]==2){estado='Rechazado'}
            if(arrayPedidos.indexOf(pedidos[i]["ident"])==-1){
                hijoIdent="<div class='col-md-12 idEstadoPedido'><div class='col-md-6 alineadoIzquierda'><h4>Pedido: "+pedidos[i]["ident"]+"</h4></div><div class='col-md-6 alineadoDerecha'><h4>Estado: "+estado+"</h4></div></div>";
                arrayPedidos.push(pedidos[i]["ident"]);
            }else{
                
            }
            var hijoNombre="<span class='col-md-5'>"+pedidos[i]["nombre"]+"</span>";
            var hijoImg="<span class='col-md-2'><img class='miniaturaArticulo' src='"+pedidos[i]["url_Img"]+"'></span>";
            var hijoPrecio="<span class='col-md-2'>"+pedidos[i]["precio"]+"€</span>";
            var hijoCantidad="<span class='col-md-2'>"+pedidos[i]["cantidad"]+" Unidades</span>";
            

            var cDiv="</div>";
            $(".misPedidos").append(div+hijoIdent+hijoNombre+hijoImg+hijoPrecio+hijoCantidad+cDiv);
        }
    }else{
          $(".misPedidos").append("<h4>Sin Pedidos</h4>");  
    }
}


function funciones_cargarBusquedaAvanzada(){
    
    $("main").load("includes/busquedaFiltros.php");
    document.getElementById("main").scrollIntoView();
    $(".current_navigation_ul").empty();
}

function funciones_rellenarCamposBA(){
    
    $.ajax({
        url:"json/getCategorias.php",
        method:"POST",
        success: function(result){
            if(result!="sin resultados"){
                var n=JSON.parse(result);
                $.each(n,function(key,value){
                   $("#categoriasBA").append("<option value='"+value["ident"]+"'>"+value["nombre"]+"</option>") 
                });
                
            }
        }
    });  
}

function funciones_filtrarBA(){
   $("#resultadosBA").empty();
    var categoria=$("#categoriasBA").val();
    var nd=$("#ndBA").val();
    var desde=$("#BAprecioDesde").val();
    var hasta=$("#BAprecioHasta").val();

    var datos=[categoria,nd,desde,hasta];
    console.log(datos);
    $.ajax({
        url:"json/filtrarBA.php",
        method:"POST",
        data:{"datos":datos},
        success: function(result){
            
            if(result!="sin resultados"){
                var n=JSON.parse(result);
                $("#numResultadosBA").html(' ('+n.length+' resultados)');    
                $.each(n,function(key,value){
                    var elc="#art"+key;
                    var comparelc="#compareArt"+key;
                    var carritolc="#addArtCarrito-"+key;
                    //var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_puntuado"],value["veces_visitado"],value["puntuacion"],value["categoria"]];
                    var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_visitado"],value["categoria"],value["disponiblidad"],value["puntuacion"],value["veces_puntuado"],value["url_video"],value["disponibilidad"],value["inventario"]];
                    var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
                    var thumbnail='<div class="thumbnail">';
                    var img=' <img src="'+value["url_Img"]+'" alt="">';
                    var caption='<div class="caption">';
                    var h4='<div class="col-md-12 captionPrecio"><h4>'+value["precio"]+'€</h4></div><br>';
                    var h4dos='<div class="col-md-12 contNombreArticulo"><p class="nombreArticulo">'+value["nombre"]+'</p></div>';
                    var cierreDiv='</div>';
                    var pm=value["puntuacion"];
                    pm=Math.round(pm);
                    var estrellas_completas=pm-(pm%1);
                    var iteracioni=0;
                    var htmlEstrellas="";
                    if(estrellas_completas>0){
                        for (iteracioni=0;iteracioni<estrellas_completas;iteracioni++){
                            htmlEstrellas+='<i class="fa fa-star" aria-hidden="true"></i>';
                        }
                    }else{
                        htmlEstrellas="Sin puntuación";
                    }
                    var ratings ='<div class="ratings"><p class="pull-right">'+value["numComentarios"]+' comentarios</p><p>'+htmlEstrellas+'</p></div>';
                    var rtngs=value["numComentarios"]+' comentarios';
                    var priceeur=value["precio"]+"€";
                    var comparedata=[value["ident"],value["url_Img_Display"],value["nombre"],priceeur,value["descripcion"],rtngs,htmlEstrellas];
                    var opciones='<div class="opciones_previewArticulo"><div class="opcion_previewArticulo" id="'+"art"+key+'"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></div><div class="opcion_previewArticulo" id="addArtCarrito-'+key+'"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i></div><div class="opcion_previewArticulo opcion_compararArticuloPreview" id="'+"compareArt"+key+'"><i class="fa fa-list-alt fa-2x" aria-hidden="true"></i></div></div>';
                    var cierreThumbnail='</div>';
                    var cierredivol='</div>';

                    var elementoCompleto=divcol+thumbnail+img+caption+h4dos+h4+cierreDiv+ratings+opciones+cierreThumbnail+cierredivol;
                    $("#resultadosBA").append(elementoCompleto);


                    $(elc).click(function(event){
                        event.preventDefault();
                        control_cargarArticulo(send);
                        return false;
                    });
                     $(comparelc).click(function(event){
                        event.preventDefault();
                        control_addCompararArticulo(comparedata);
                        return false;
                    });

                    if(value["disponibilidad"]>0 && value["inventario"]>0){
                        $(carritolc).click(function(event){
                            event.preventDefault();
                            control_addArticuloCarrito(comparedata);
                            return false;
                        });    
                    }else{
                       $(carritolc).addClass("sinStock"); 
                       $(carritolc).html("Sin Stock"); 
                    }


                });
                
            }else{
                $("#numResultadosBA").html(' (0 resultados)');  
            }
        }
    });
}


function gestion_rellenarNoticias(){
    $(".rowsNoticias").empty();
     $.ajax({
        url:"json/getNoticias.php",
        method:"POST",
        success: function(result){
            if(result!="sin resultados"){
                var n=JSON.parse(result);
                $.each(n,function(key,value){
                    console.log(value);
                    var row="<article class='noticia'>"+value["cuerpo"]+"</article>";
                    $("#rowsNoticias").append(row);
                });
               
            }else{
                
            }
        }
    });
}

