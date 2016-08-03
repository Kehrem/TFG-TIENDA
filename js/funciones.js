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
    
    var ret;
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

       $(".current_navigation_ul").append('<li><a href="#" id="actual_Categoria" class="current_Category">>'+param+'</a></li>');
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
        $(".current_navigation_ul").append('<li><a id="actual_Categoria" class="current_Category"  href="#" >>'+nombreCategoriaPadre+'</a></li>');
        $(".current_navigation_ul").append('<li><a id="actual_subCategoria" class="current_subCategory" href="#">>'+param+'</a></li>');
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
        $("main").empty();
        $("main").append("<div class='col-md-12 categoria_vacia'><h3><i class='fa fa-exclamation-triangle fa-2x' aria-hidden='true'></i> &nbsp;No hay articulos en esta categoría</h3></div>");
    }else{
    
        $.each(param,function(key,value){

            var elc="#art"+key;
            var comparelc="#compareArt"+key;
            //var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_puntuado"],value["veces_visitado"],value["puntuacion"],value["categoria"]];
            var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_visitado"],value["categoria"],value["disponiblidad"],value["puntuacion"],value["veces_puntuado"]];
            var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
            var thumbnail='<div class="thumbnail">';
            var img=' <img src="'+value["url_Img"]+'" alt="">';
            var caption='<div class="caption">';
            var h4='<h4 class="pull-right">'+value["precio"]+'€</h4>';
            var h4dos='<h4>'+value["nombre"]+'</h4>';
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
            var comparedata=[value["ident"],value["url_Img_Display"],value["nombre"],value["precio"],value["descripcion"],rtngs,htmlEstrellas];
            var opciones='<div class="opciones_previewArticulo"><div class="opcion_previewArticulo" id="'+"art"+key+'"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></div><div class="opcion_previewArticulo" id="'+"art"+key+'"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></div><div class="opcion_previewArticulo opcion_compararArticuloPreview" id="'+"compareArt"+key+'"><i class="fa fa-list-alt fa-2x" aria-hidden="true"></i></div></div>';
            var cierreThumbnail='</div>';
            var cierredivol='</div>';

            var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+cierreDiv+ratings+opciones+cierreThumbnail+cierredivol;
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

        });
        
    }
}

function funciones_cargarArticulo(param){
    
    $("main").load("includes/display_articulo.php",{'data[]': param});
    document.getElementById("main").scrollIntoView();
    
    if($(".current_navigation_ul:last-child").hasClass("current_Item")){
     
             
        
    }else{
        
    
        $(".current_navigation_ul").append('<li><a class="current_Item" href="#">>adadfafdadfaf</a></li>');
                
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
    $("#articulo_item-numRatings").html(param[10]+" puntuaciones");
    $("#articulo_item-Ratings").html(htmlEstrellas);
    
    //$("#articulo_item-Ratings").html(param[6]+" puntuaciones");
    $(".opciones_displayArticulo").attr("data-id",param[0]);
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
        $("#reviews_container").append("<h3>No hay ningún comentario, sé tu el primero en dejar uno!</h3>");
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
                $(".well").before().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Valoración enviada con éxito! </span></div>");
                $(".contCambiarDatos_correcto").fadeIn(1000);
                setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");}, 3000);
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
    var a = document.getElementsByClassName("dataCompArticulo");
    if(a.length<3){
        control_restaurar("compararArticulos");
        var ident="cArt-"+articulo[0];
        var selectident="#"+ident;
            $(".contenedor_compararArticulos").fadeIn(300);
            $(".contCompararArticulos").append('<div class="dataCompArticulo" id='+ident+'></div>');
            $(selectident).append('<span class="col-md-12"><i class="eliminarArticuloComparacion fa fa-times fa-2x" aria-hidden="true"></i></span>');
            $(selectident).append("<span class='cArtm'><h4>"+articulo[2]+"</h4><img src='"+articulo[1]+"' alt='"+articulo[2]+"'></span>");
             $(".contCompararArticulos").after().append("<div class='col-md-12 display_none contCambiarDatos_correcto'><span class='cambiarDatos_correcto'>Producto añadido correctamente </span></div>");
            $(".contCambiarDatos_correcto").fadeIn(300);
             setTimeout(function(){$(".contCambiarDatos_correcto").fadeToggle("slow");$(".contCambiarDatos_correcto").remove();}, 2000);
        if(sessionStorage.getItem("compararArticulos")){
            var actual=sessionStorage.getItem("compararArticulos");
            var actualizar=actual+JSON.stringify(articulo);
            sessionStorage.setItem("compararArticulos",actualizar);
        }else{
            sessionStorage.setItem("compararArticulos",JSON.stringify(articulo));
            //sessionStorage.setItem
        }
        $(".eliminarArticuloComparacion").click(function(){
            $(this).parent().parent().remove();
             var aprima = document.getElementsByClassName("dataCompArticulo");
            if(aprima.length==0){
                control_cerrar("compararArticulos");
            }
        });
        
    }else{
      $(".contCompararArticulos").after().append("<div class='col-md-12 display_none contCambiarDatos_incorrecto'><span class='cambiarDatos_incorrecto'>Límite de 3 productos superado </span></div>");
        $(".contCambiarDatos_incorrecto").fadeIn(1000);
         setTimeout(function(){$(".contCambiarDatos_incorrecto").fadeToggle("slow");$(".contCambiarDatos_incorrecto").remove();}, 3000);
        
    }
    
    
}