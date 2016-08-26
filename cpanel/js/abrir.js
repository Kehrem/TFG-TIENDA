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
