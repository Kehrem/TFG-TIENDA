<div class='col-md-12' id="contProgresoCompra">
    <div class="col-md-12 contDetallesPago">
        <h4>Pagar</h4>

<!--         <form id="formPago" action="https://www.sandbox.paypal.com/cgi-bin/webscr" id="formPago" method="post">-->
         <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="formPago">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="energiapenolite.pagos@gmail.com">
             <input type="hidden" name="currency_code" value="EUR">
<!--
             <input type="hidden" name="item_name_1" value="Gastos de Envio">
             <input type="hidden" name="amount_1" value="11.00">
             <input type="hidden" name="shipping_1" value="1.75">
            <input type="hidden" name="item_name_1" value="Item Name 1">
            <input type="hidden" name="amount_1" value="1.00">
            <input type="hidden" name="shipping_1" value="1.75">
            <input type="hidden" name="item_name_2" value="Item Name 2">
            <input type="hidden" name="amount_2" value="2.00">
            <input type="hidden" name="shipping_2" value="2.50">
-->
            
        </form>
    </div>
    <div class='navegacionCompra'>
        <a onclick="control_retrocederCompra();" id="retrocederCompra" class="pull-left"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <a onclick="control_avanzarCompra();" id='continuarCompra' class="pull-right"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></a>
    </div>
</div>
<script>
control_completarPayPalForm();
//configuramos el form para paga
</script>
    <!-- /.container -->
