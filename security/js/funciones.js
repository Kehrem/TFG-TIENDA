function funciones_jstest(){
    alert("balls");
}

function funciones_phptest(){
    
    $.ajax({
        url:"json/phptest.php",
        method:"POST",
        success: function(result){
            console.log(result);
        }
    });
    
}

function funciones_toggleResponsiveNav(){
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}

function funciones_cargarMain(){
    
    $("main").load("includes/index_main.php");
}

function funciones_fetchCategorias(){
    
    var ret;
    $.ajax({
        url:"json/getCategorias.php",
        method:"POST",
        dataType: "json",
        success: function(result){
           
            //console.log(result);
            console.log(result);
            funciones_cargarCategorias(result);
        }
                
    });
}


function funciones_cargarCategorias(r){

    $.each(r,function(key,value){
        
        if(value["raiz"]==null){
            ///
            var a ="'"+value["nombre"]+"'";
            var im="'"+value["url_Img"]+"'";
            var ident=value["ident"];
            var aimident=[a,im,ident];
            $(".list-group").append('<a href="#" onclick="control_contenidoCategorias('+aimident+');" id="list-group-item-'+key+'" class="list-group-item">'+value["nombre"]+'</a>');   
        }else{
            
            var n=(value["raiz"])-1;
            if($("#list-group-item-"+n).children(0).hasClass("dropdown-content")){
                    ///
               var a ="'"+value["nombre"]+"'";
            var im="'"+value["url_Img"]+"'";
                        var ident=value["ident"];
            var aimident=[a,im,ident];
               $("#list-group-item-"+n).children(0).append('<a href="#" onclick="control_contenidoCategorias('+aimident+')" id="list-group-item-'+key+'" class="list-group-item lgi-t">'+value["nombre"]+'</a>');
                               
            }else{
                 var n=(value["raiz"])-1;
                $("#list-group-item-"+n).append('<div class="dropdown-content"></div>');
                ///
                var a ="'"+value["nombre"]+"'";
            var im="'"+value["url_Img"]+"'";
                       var ident=value["ident"];
            var aimident=[a,im,ident];
                $("#list-group-item-"+n).children(0).append('<a href="#" onclick="control_contenidoCategorias('+aimident+')" id="list-group-item-'+key+'"  class="list-group-item lgi-t">'+value["nombre"]+'</a>');
                
            }
           
        }
        
        
    });
}

function funciones_contenidoCategorias(param,param2,param3){
    
    console.log(param);
    console.log(param2);
    console.log(param3);
    $("main").load("includes/categoria.php",{'data[]': [param,param2,param3]});
    
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
        var snippet='<p>'+value["descripcion"]+'</p>';
        var cierreDiv='</div>';
        var ratings ='<div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div>';
        var cierreThumbnail='</div>';
        var cierredivol='</div>';
        
        var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+snippet+cierreDiv+ratings;
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
        var snippet='<p>'+value["descripcion"]+'</p>';
        var cierreDiv='</div>';
        var ratings ='<div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div>';
        var cierreThumbnail='</div>';
        var cierredivol='</div>';
        
        var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+snippet+cierreDiv+ratings;
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
        var divcol='<div class="col-sm-4 col-lg-4 col-md-4">';
        var thumbnail='<div class="thumbnail">';
        var img=' <img src="'+value["url_Img"]+'" alt="">';
        var caption='<div class="caption">';
        var h4='<h4 class="pull-right">'+value["precio"]+'€</h4>';
        var h4dos='<h4><a href="#">'+value["nombre"]+'</a></h4>';
        var snippet='<p>'+value["descripcion"]+'</p>';
        var cierreDiv='</div>';
        var ratings ='<div class="ratings"><p class="pull-right">15 reviews</p><p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></div>';
        var cierreThumbnail='</div>';
        var cierredivol='</div>';
        
        var elementoCompleto=divcol+thumbnail+img+caption+h4+h4dos+snippet+cierreDiv+ratings;
        $(".display_ArticulosxCategoria").append(elementoCompleto);

    });
}
