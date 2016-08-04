<div class='col-md-12' id="contProgresoCompra">
    <div class="col-md-12 contDetallesDireccion">
        <h4>Dirección de Envío</h4>
    </div>
    <div class='navegacionCompra'>
        <a onclick="" id="retrocederCompra" class="pull-left">Atrás</a>
        <a onclick="control_avanzarCompra();" id='continuarCompra' class="pull-right">Continuar</a>
    </div>
</div>
<script>
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
    }else{
        
        var aDiv="<div class='col-md-12 detallesArticuloCarrito'>";
        var h3="<h3>La cesta está vacía!</h3>"
        var cDiv="</div>";
        $(".contDetallesCarrito").append(aDiv+h3+cDiv);

    }
</script>
    <!-- /.container -->
