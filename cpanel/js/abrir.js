function abrir_nuevoKpi(){
    
    $(".contParametros").empty();
    $(".contParametros").load("includes/nuevoKpi.php");
}

function abrir_GraficasKpis(){
    $("main").load("includes/gestion_GraficasKpis.php");
}

function abrir_avisosAdmin(){
    $("main").load("includes/avisos.php");
}

function abrir_elementosPortada(){
    $("main").load("includes/gestion_elementosPortada.php");
}

function abrir_modulos(){
    $("main").load("includes/modulos.php");
}

function abrir_categorias(){
    $("main").load("includes/categorias.php");
}

function abrir_articulos(){
    $("main").load("includes/articulos.php");
}

function abrir_proveedores(){
    $("main").load("includes/proveedores.php");
}

function abrir_databases(){
    $("main").load("includes/databases.php");
}