function control_navegarA(urlDestino){
    funciones_navegarA(urlDestino);
}

function control_popUpProcesando(operacion){
    funciones_popUpProcesando(operacion);
}
function control_toggleResponsiveNav(){
    funciones_toggleResponsiveNav();
}

function control_cargarAreaUsuarios(modo){
    funciones_cargarAreaUsuarios(modo);
}

function control_cargarCategorias(){
    
    funciones_fetchCategorias();

}
function control_cargarRegistroError(){
    
    funciones_cargarRegistroError();

}
function control_cargarRegistroCompletado(){
    
    funciones_cargarRegistroCompletado();

}
function control_cargarRegistroActivado(){
    
    funciones_cargarRegistroActivado();

}
function control_cargarRegistroYaActivado(){
    
    funciones_cargarRegistroYaActivado();

}

function control_contenidoCategorias(param,param2,param3,param4){
    funciones_contenidoCategorias(param,param2,param3,param4);
}

function control_cargarMain(){
    
   funciones_cargarMain(); 
}
function control_cargarMain2(){
    
   funciones_cargarMain2(); 
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

function control_fetchArticulosxCategoria(categoria,orden){
    funciones_fetchArticulosxCategoria(categoria,orden);
}

function control_cargarArticulosxCategoria(param){
    funciones_cargarArticulosxCategoria(param);
}

function control_cargarArticulo(param){
    funciones_cargarArticulo(param);
}

function control_cargarDetallesArticulo(param){

    funciones_cargarDetallesArticulo(param);

}

function control_fetchReviewsArticulo(articulo){
    funciones_fetchReviewsArticulo(articulo);
}

function control_rellenarReviewsArticulo(reviews){
    funciones_rellenarReviewsArticulo(reviews);
}

function control_puntuarArticulo(puntuacion){
    funciones_puntuarArticulo(puntuacion);
}

function control_dejarReview(contenido,puntuacion,articulo){
    funciones_dejarReview(contenido,puntuacion,articulo);
}

function control_toggleLeaveReview(){
    funciones_toggleLeaveReview();
}

function control_comprobarVotoUsuario(articulo){
    funciones_comprobarVotoUsuario(articulo);
}
function control_resize_reviewComment(){
    funciones_resize_reviewComment();
}

function control_cargarRegistro(){

    funciones_cargarRegistro();
}

function control_cargarLogIn(){
    
    funciones_cargarLogIn();
    
}

function control_getProvincias(){
    
    funciones_getProvincias();

}

function control_rellenarProvincias(param){
    
    funciones_rellenarProvincias(param);

}

function control_comprobarMailEnUso(param){
    funciones_comprobarMailEnUso(param);

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
        case "nombre":
            control_cambiarIconoInput(param,"ok");
            break;
        case "apellidos":
            control_cambiarIconoInput(param,"ok");
            break;
        case "telefono":
            control_cambiarIconoInput(param,"ok");
            break;
        case "direccion":
            control_cambiarIconoInput(param,"ok");
            break;
        case "condiciones":
            control_cambiarIconoInput(param,"ok");
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

function control_compruebaFormRegistro(evento,form){
   var r=funciones_compruebaFormRegistro(evento,form);
    
    if(r!=false){
        control_altaUsuario(r);
    }
}

function control_compruebaFormAcceso(evento,form){
   var r=funciones_compruebaFormAcceso(evento,form);
    
}

function control_altaUsuario(param){
    funciones_altaUsuario(param);
}

function control_logOut(){
    funciones_logOut();
}

function control_cargarAreaUsuario(){
    funciones_cargarAreaUsuario();
    
}

function control_cargarDatosUsuario(elemento,urlInclude){
    funciones_cargarDatosUsuario(elemento,urlInclude);   
}

function control_comprobarNuevoMailEnUso(param){
    funciones_comprobarNuevoMailEnUso(param);
}

function control_comprobarFormDatosPersonales(evento,form){
    funciones_comprobarFormDatosPersonales(evento,form);
}
function control_addDireccion(){
    funciones_addDireccion();
}
function control_editarDireccion(numero){
    funciones_cargarEditarDireccion(numero);   
    //funciones_editarDireccion(numero);
}

function control_eliminarDireccion(numero){
    funciones_eliminarDireccion(numero);
}
function control_comprobarEditarDireccion(evento,formulario){
    funciones_comprobarEditarDireccion(evento,formulario);
}
function control_comprobarAddDireccion(evento,formulario){
    funciones_comprobarAddDireccion(evento,formulario);
}
function control_cerrar(target){
    funciones_cerrar(target);
}
function control_minimizar(target){
    funciones_minimizar(target);
}
function control_restaurar(target){
    funciones_restaurar(target);
}
function control_abrirCompartirDisplay(){
    funciones_abrirCompartirDisplay();
}
function control_addCompararArticulo(articulo){
    funciones_addCompararArticulo(articulo);
}
function control_compararArticulos(){
    funciones_compararArticulos();
}
function control_eliminarArticuloComparacion(elemento,articulo){
    funciones_eliminarArticuloComparacion(elemento,articulo);
}
function control_addArticuloCarrito(data){
    funciones_addArticuloCarrito(data);
}
function control_cargarDetallesCarrito(){
    funciones_cargarDetallesCarrito();
}
function control_eliminarArticuloCarrito(elemento,articulo){
    funciones_eliminarArticuloCarrito(elemento,articulo);
}
function control_actualizarCarrito(){
    funciones_actualizarCarrito();
}
function control_avanzarCompra(){
    funciones_avanzarCompra();
}
function control_retrocederCompra(){
    funciones_retrocederCompra();
}
function control_vaciarCestaCompra(){
    funciones_vaciarCestaCompra();
}
function control_fetchDirecciones(){
    funciones_fetchDirecciones();
}
function control_seleccionarEnviarAqui(elemento){
    funciones_seleccionarEnviarAqui(elemento);
}
function control_cargarMetodosEnvio(){
    funciones_cargarMetodosEnvio();
}
function control_seleccionarMetodoEnvio(param){
    funciones_seleccionarMetodoEnvio(param);
}
function control_completarPayPalForm(){
    funciones_completarPayPalForm();
}
function control_visualizarCestaCompra(){
    funciones_visualizarCestaCompra();
}
function control_visualizarDireccion(){
    funciones_visualizarDireccion();
}
function control_visualizarMetodoEnvio(){
    funciones_visualizarMetodoEnvio();
}
function control_comprobarUnidades(evento,param){
    funciones_comprobarUnidades(evento,param);
}
function control_aumentarUnidades(articulo,elemento){
    funciones_aumentarUnidades(articulo,elemento);
}
function control_disminuirUnidades(articulo,elemento){
    funciones_disminuirUnidades(articulo,elemento);
}
function control_prePago(evento){
    evento.preventDefault();
    funciones_prePago();
    //$("#formPago").submit();
}
function control_postPago(){
    funciones_crearPedido();
    funciones_submitForm("#formPago");
}
function control_cargarPedidos(pedidos){
    funciones_cargarPedidos(pedidos);
}

function control_recogerDatosBusqueda(busqueda){
    funciones_recogerDatosBusqueda(busqueda);
}

function control_cargarBusquedaAvanzada(){
    funciones_cargarBusquedaAvanzada();
}

function rellenarCamposBA(){
    funciones_rellenarCamposBA();
}
function control_test(){
    
    alert("balls");
}