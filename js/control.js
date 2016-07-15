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

function control_cargarRegistro(){

    funciones_cargarRegistro();
}

function control_getProvincias(){
    
    funciones_getProvincias();

}

function control_rellenarProvincias(param){
    
    funciones_rellenarProvincias(param);

}
function control_comprobarCampo(param){
    
    var r=funciones_comprobarCampo(param);
    switch(r){
        case "cp":
            control_codigoPostal(param);
            break;
        case "localidad":
            control_localidad(param);
            break;
        default:
            break;
    }
    
}
function control_compruebaKeyPress(param,param2){
    funciones_compruebaKeyPress(param,param2);
}
function control_compruebaKeyUp(param,param2){
    funciones_compruebaKeyUp(param,param2);
}

function control_codigoPostal(param){
    
    //console.log($(param).val());
    funciones_codigoPostal(param);

}

function control_localidad(param){
    
    //console.log($(param).val());
    funciones_localidad(param);

}

function control_cambioProvincia(){
    funciones_cambioProvincia();
}

function control_cambiarIconoInput(param,param2){
//param=objetivo
//param2=nuevo valor
    funciones_cambiarIconoInput(param,param2);
    
}

function control_test(){
    alert("balls");
}