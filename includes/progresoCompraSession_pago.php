<div class='col-md-12' id="contProgresoCompra">
    <div class="col-md-12 contDetallesPago">
        <h4>Pagar</h4>
<!--        <form action="https://www.paypal.com/es/cgi-bin/webscr" method="post">-->
       <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"id="formPago" method="post">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="6RNT8A4HBBJRE">
           <input type="hidden" name="return" value="http://www.micodigophp.com/gracias.html">
          
        </form>
    </div>
    <div class='navegacionCompra'>
        <a onclick="control_retrocederCompra();" id="retrocederCompra" class="pull-left"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
        <a onclick="control_avanzarCompra();" id='continuarCompra' class="pull-right"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></a>
    </div>
</div>
<script>
    
//configuramos el form para pagar
    
    $("#formPago").append('<input type="hidden" name="cmd" value="_cart">');
    $("#formPago").append('<input type="hidden" name="upload" value="1">');
    $("#formPago").append('<input type="hidden" name="business" value="energiapenolite.pagos@gmail.com">');
  $("#formPago").append('<input type="hidden" name="currency_code" value="EUR">');
  $("#formPago").append('<input type="hidden" name="amount" value="'+parseFloat(localStorage.getItem("dineroTotalCarrito"))+'">');
  
    if(localStorage.getItem("identsCarrito")!=null){
    
        var identsStore=localStorage.getItem("identsCarrito");
        var idents=identsStore.split("|");
        var array=[];
        if(idents.length-1>0){
            for(var i=0;i<idents.length-1;i++){
                var detallesArticulo=JSON.parse(localStorage.getItem("articuloCarrito-"+idents[i]));
                var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
                var img="<div class='col-md-3'><img class='imgDetalleArticuloCarrito' src='"+detallesArticulo[1]+"'></div>";
                var nombre="<div class='col-md-3 detalleArticuloCarrito_texto'><h4>"+detallesArticulo[2]+"</h4></div>";
                var descripcion="<div class='col-md-3 detalleArticuloCarrito_texto'>"+detallesArticulo[4]+"</div>";
                var precio="<div class='col-md-3 detalleArticuloCarrito_texto detalleArticuloCarrito_precio'><h4>"+detallesArticulo[3]+"€</h4></div>";
                var eliminar="<div class='eliminarDelCarrito' onclick='control_eliminarArticuloCarrito(this,"+idents[i]+","+detallesArticulo[3]+")'><i class='fa fa-times fa-2x' aria-hidden='true'></i></div>";
                var cDiv="</div>";
                $(".contDetallesCarrito").append(aDiv+nombre+img+descripcion+precio+eliminar+cDiv);

            }
        }
        $("#formPago").append('<input type="image" src="http://www.paypal.com/es_ES/i/btn/x-click-but01.gif" name="submit" alt="Paga con PayPal - Es rapido, gratis y seguro!">');
    }else{
        
    }
</script>
    <!-- /.container -->
