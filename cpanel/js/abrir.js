function abrir_nuevoKpi(){
    
    $(".contParametros").empty();
    $(".contParametros").load("includes/nuevoKpi.php");
}

function abrir_GraficasKpis(disparador){
    
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/gestion_GraficasKpis.php");
}

function abrir_avisosAdmin(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/avisos.php");
}

function abrir_elementosPortada(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/gestion_elementosPortada.php");
}

function abrir_modulos(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/modulos.php");
}

function abrir_categorias(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/categorias.php");
}

function abrir_articulos(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/articulos.php");
}

function abrir_proveedores(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/proveedores.php");
}

function abrir_databases(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/databases.php");
}

function abrir_noticias(disparador){
    $(".menuActivo").removeClass("menuActivo");
    $(disparador).addClass("menuActivo");
    $("main").load("includes/noticias.php");
}