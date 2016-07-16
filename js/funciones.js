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

function funciones_toggleResponsiveNav(){
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}

function funciones_cargarMain(){
    
    $("main").load("includes/index_main.php");
    document.getElementById("main").scrollIntoView();
    $(".current_navigation_ul").empty();
    $(".current_navigation_ul").append('<li><a href="#Home" onclick="control_cargarMain()">Home</a></li>');    
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
            
            $(".list-group").append('<a href="#" name="'+value["ident"]+'" data-urlimg="'+value["url_Img"]+'" data-nombre='+value["nombre"]+' id="list-group-item-'+key+'" class="list-group-item">'+value["nombre"]+'</a>');
        }
        if(value["raiz"]!=null){
            
            var n=(value["raiz"])-1;
            if($("#list-group-item-"+n).children(0).hasClass("dropdown-content")){
               $("#list-group-item-"+n).children(0).append('<a href="#" id="list-group-item-'+key+'" class="list-group-item lgi-t">'+value["nombre"]+'</a>');
                               
            }else{
                 var n=(value["raiz"])-1;
                $("#list-group-item-"+n).append('<div class="dropdown-content"></div>');
                ///
                $("#list-group-item-"+n).children(0).append('<a href="#" id="list-group-item-'+key+'"  class="list-group-item lgi-t">'+value["nombre"]+'</a>');
                
                
            }
           
        }
        $("#list-group-item-"+key).click(function(event){
           
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
            
            funciones_cargarPopulares(result);
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
        dataType: "json",
        data: {"categoria":param},
        success: function(result){
            
            funciones_cargarMasVendidos(result);
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

function funciones_fetchArticulosxCategoria(param){
   
    //data: {status: status, name: name},
    
    $.ajax({
        url:"json/getArticulosxCategoria.php",
        method:"POST",
        dataType: "json",
        data: {"categoria":param},
        success: function(result){
            
            funciones_cargarArticulosxCategoria(result);
        }
                
    });
    
    
}

function funciones_cargarArticulosxCategoria(param){

    $.each(param,function(key,value){
        
        var elc="#art"+key;
        //var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_puntuado"],value["veces_visitado"],value["puntuacion"],value["categoria"]];
        var send=[value["ident"],value["nombre"],value["url_Img"],value["url_Img_Display"],value["precio"],value["descripcion"],value["veces_visitado"],value["categoria"]];
        var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
        var thumbnail='<div class="thumbnail">';
        var img=' <img src="'+value["url_Img"]+'" alt="">';
        var caption='<div class="caption">';
        var h4='<h4 class="pull-right">'+value["precio"]+'€</h4>';
        var h4dos='<h4><a href="#" id="'+"art"+key+'">'+value["nombre"]+'</a></h4>';
        var cierreDiv='</div>';
        var ratings ='<div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div>';
        var cierreThumbnail='</div>';
        var cierredivol='</div>';
        
        var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+cierreDiv+ratings;
        $(".display_ArticulosxCategoria").append(elementoCompleto);
        
        $(elc).click(function(event){
            event.preventDefault();
            control_cargarArticulo(send);
            return false;
        });

    });
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
    
    //$("#articulo_item-Ratings").html(param[6]+" puntuaciones");
    
    
}

function funciones_cargarDetallesArticulo2(param){
    
    //ajax for ratings
    $.ajax({
        url:"json/getRatingsArticulo.php",
        method:"POST",
        dataType: "json",
        data: {"ident":param},
        success: function(result){
            
            control_rellenarDetallesArticulo2(result);
        }
                
    });
    
}

function funciones_rellenarDestallesArticulo2(param){
    
   
    var np=param["puntuacion"]["num_puntuaciones"];
    var pm=param["puntuacion"]["puntuacion_media"];
  $("#articulo_item-numRatings").html(np+" Reviews");
    
    var estrellas_completas=pm-(pm%1);
    var semiestrellas=pm%1;
     
        if((np)>0){
           for(var it=0;it<estrellas_completas;it++){
               $("#articulo_item-Ratings").append('<span class="estrellita"><i class="fa fa-star" aria-hidden="true"></i></span>');
           }
            if(semiestrellas>0.5){
                $("#articulo_item-Ratings").append('<span class="estrellita"><i class="fa fa-star-half" aria-hidden="true"></i></span>');
            }
            $("#articulo_item-Ratings").append( ' '+estrellas_completas+'.'+(semiestrellas*100)+' estrellas');
            
        }else{
            $("#articulo_item-Ratings").append('<span class="estrellita">Sin puntuación</span>');
        }
    
    //REVIEWS
    
   $.each(param["reviews"],function(key,value){
       
             
       var row='<div class="row">';
       var col='<div class="col-md-12" id="review-col-'+key+'"></div><hr>';
       var rowclose='</div>';
       $("#reviews_container").append(row+col+rowclose);
       $("#review-col-"+key).append('<div class="reviews_userdata"><img class="reviews_user-img-thumbnail" src="'+value["url_Img"]+'" alt="imagen_perfil_usuario" ><p class="reviews_username">'+value["username"]+'<span class="pull-right">'+value["fecha"]+'</span></p></div>');
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

function funciones_toggleLeaveReview(){
    
    $(".leave_Review-target").slideToggle("slow");
    
}

function funciones_resize_reviewComment(){

}

function funciones_cargarRegistro(){

    $("main").load("includes/registro.php");
    document.getElementById("main").scrollIntoView();
    
}

function funciones_getProvincias(){

    
    $.ajax({
        url:"json/getProvincias.php",
        method:"POST",
        success: function(result){
            
           control_rellenarProvincias(JSON.parse(result));
            //control_rellenarProvincias(result);
        }
    });
    
}

function funciones_rellenarProvincias(param){
    
    $(".form_signUp-provincias").append("<option value='-1'> </option>");
    
    $.each(param, function( index, value ) { 
        
        $(".form_signUp-provincias").append("<option value='"+value["ident"]+"'>"+value["nombre"]+"</option>");

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
                            control_codigoPostal(param2);
                        }
                    }

                }else{
                    console.log(x);
                       if(cont.length<9){
                        cont+=String.fromCharCode(x);
                        $(param2).val(cont);
                    }
                }
                

            }
    }
    if(($(param2).attr("id")=="input_localidad") || ($(param2).attr("id")=="input_nombre") || ($(param2).attr("id")=="input_apellidos")){
        var arraypermitidos=[65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,32];
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
                            
                            control_localidad(param2);
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
 
        var x = event.which || event.keyCode;
        if($(param2).attr("id")=="input_localidad"){

            if(x==8){
                if($(param2).val().length>2){
            
                    control_localidad(param2);

                }else{
                    control_cambiarIconoInput(param2,"error");
                }
            }
        }
    
    
}

function funciones_comprobarCampo(param){

    $return="ini";
    if ($(param).attr("id")=="input_codigoPostal"){
        //nada que comprobar, autocomprobación mediante keypress
        $return="cp";
    }
    if ($(param).attr("id")=="input_localidad"){
        $return="localidad";
    }
    if ($(param).attr("id")=="input_nombre"){
        //nada que comprobar ya lo hacen keydown y pattern
        //suponemos que el valor va a ser siempre correcto así que lo darémos por correcto. Lo ponemos en carga mientras llega a control donde se pondrá en correcto.
        if($(param).val().length<3){
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
            
                //si está rellenado comprobamos que sean iguales
                if($(param).val()==$("#input_confirmarEmail").val()){
                    control_cambiarIconoInput(param,"ok");
                    control_cambiarIconoInput($("#input_confirmarEmail"),"ok");
                
                    
                }else{
                    
                    //si no coinciden los dos están mal
                    control_cambiarIconoInput(param,"error");
                    control_cambiarIconoInput($("#input_confirmarEmail"),"error");
                
                }
                
            }
            
            
        }else{
            
            //si no valida, paramos
        
            control_cambiarIconoInput(param,"error");
        }
    }
    if ($(param).attr("id")=="input_confirmarEmail"){
        
        if($(param).val()==""){return false};
        
        //si el email está vacío lo damos por incorrecto directamente
        if($("#input_email").val()==""){
         
            control_cambiarIconoInput(param,"error");
        
            //en el span del error mostraríamos mensaje
            
        }else{
         
            //si está rellenado comprobamos que sean iguales
            if($("#input_email").val()==$(param).val()){
             
                //si los valores son iguales damos por válido
                var email = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                
                if(email.test($(param).val())){
                control_cambiarIconoInput(param,"ok");
                control_cambiarIconoInput($("#input_email"),"ok");
        
                }else{
                    
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_email"),"error");
        
                    
                }
                
            }else{
             
                control_cambiarIconoInput(param,"error");
                control_cambiarIconoInput($("#input_email"),"error");
            }   
        }
    }
    if ($(param).attr("id")=="input_telefono"){
        if($(param).val().length!=9){
            
            //incorrecto
            control_cambiarIconoInput(param,"error");
                    
        }else{
            
            control_cambiarIconoInput(param,"ok");
            
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
            
            
            console.log(result);
            if(result=="Ok - querymod=0"){
                
                control_cambiarIconoInput(param,"ok");                
            }
            if(result=="Ok - querymod=1"){
                
                control_cambiarIconoInput(param,"ok");
                control_cambiarIconoInput($("#input_localidad"),"ok");
                
            }
            if(result=="Error 0"){
                
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
            
            
            console.log(result);
            if(result=="Ok - querymod=0"){
                
                //cp correcto!
                control_cambiarIconoInput(param,"ok");
                
            }
            if(result=="Ok - querymod=1"){
                
                control_cambiarIconoInput(param,"ok");
                control_cambiarIconoInput($("#input_codigoPostal"),"ok");
                 
            }
            if(result=="Error 0"){
                
                control_cambiarIconoInput(param,"error");               
            }
        }
    });
}

function funciones_cambiarIconoInput(param,param2){
    
    var obj=$(param).next().next().children(0);
    
    if(param2=="ok"){
           $(obj).removeClass("fa-spinner");
                $(obj).removeClass("fa-spin");
                $(obj).removeClass("fa-fw");
                $(obj).removeClass("fa-exclamation-circle");
        $(obj).addClass("fa-check-circle-o");
        $(obj).css("color","green");
            
    }
    if(param2=="error"){
           $(obj).removeClass("fa-spinner");
                $(obj).removeClass("fa-spin");
                $(obj).removeClass("fa-fw");
                $(obj).addClass("fa-exclamation-circle");
        $(obj).removeClass("fa-check-circle-o");
        $(obj).removeClass("fa-question-circle");
        $(obj).css("color","red");
            
    }
    if(param2=="desconocido"){
           $(obj).removeClass("fa-spinner");
                $(obj).removeClass("fa-spin");
                $(obj).removeClass("fa-fw");
                $(obj).removeClass("fa-exclamation-circle");
        $(obj).removeClass("fa-check-circle-o");
        $(obj).addClass("fa-question-circle");
        $(obj).removeClass("fa-question-circle");
    
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