function control_toggleResponsiveNav(){
    funciones_toggleResponsiveNav();
}

function control_cargarCategorias(){
    
    funciones_fetchCategorias();

}

function control_contenidoCategorias(param,param2,param3,param4){
    funciones_contenidoCategorias(param,param2,param3,param4);
}

function control_cargarMain(){
    
   funciones_cargarMain(); 
}

function control_fetchPopulares(param){
    funciones_fetchPopulares(param);
}

function control_cargarPopulares(param){
    funciones_cargarPopulares(param);
}

function control_fetchMasVendidos(param){
    funciones_fetchMasVendidos(param);
}

function control_cargarMasVendidos(param){
    funciones_cargarMasVendidos(param);
}

function control_fetchArticulosxCategoria(param){
    funciones_fetchArticulosxCategoria(param);
}

function control_cargarArticulosxCategoria(param){
    funciones_cargarArticulosxCategoria(param);
}

function control_cargarArticulo(param){
    funciones_cargarArticulo(param);
}

function control_cargarDetallesArticulo(param){
    
    //details 
    funciones_cargarDetallesArticulo(param);
    //ajax for ratings
    control_cargarDetallesArticulo2(param[0]);
    
}

function control_cargarDetallesArticulo2(param){
    funciones_cargarDetallesArticulo2(param);
}

function control_rellenarDetallesArticulo2(param){
    funciones_rellenarDestallesArticulo2(param);
}

function control_toggleLeaveReview(){
    funciones_toggleLeaveReview();
}

function control_resize_reviewComment(){
    funciones_resize_reviewComment();
}
function control_test(){
    alert("balls");
}