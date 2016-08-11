<div class='col-md-12' id="contProgresoCompra">
        <div class="col-md-12 contDetallesPago">
            <h4>Resumen de los datos</h4>
             <div class="col-md-12 contDetallesCarrito">
                <h4>Cesta de la compra</h4>
              </div>
        </div>
        <div class="col-md-12 contDetallesEnvio">
            <h4>Dirección de Envío</h4>
            <div class='col-md-12' id='listaDirecciones'>

            </div>
        </div>
        <div class="col-md-12 contDetallesMetodoEnvio">
            <h4>Método de Envío</h4>
            <div class='col-md-12' id='listaMetodosEnvio'>

            </div>
        </div>
        <div class="col-md-12 contPagar">
            <h4>Pagar Con</h4>  
            <div class="col-md-2 col-md-push-5">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" action="control_test();" method="post" id="formPago">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="upload" value="1">
                <input type="hidden" name="business" value="energiapenolite.pagos@gmail.com">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="cancel_return" value="json/cancelarPago.php">
                
                </form>
            </div>
        </div>
         
    </div>
    <div class='navegacionCompra'>
        <a onclick="control_retrocederCompra();" id="retrocederCompra" class="pull-left"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
    </div>
<script>
    control_visualizarCestaCompra();
</script>
<script>
    control_visualizarDireccion();
</script>
<script>
    control_visualizarMetodoEnvio();
</script>
<script>
    control_completarPayPalForm();
</script>
    <!-- /.container -->
