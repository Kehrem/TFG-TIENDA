<div class="col-md-12 contPedidos">
    <h4>Mis Pedidos</h4>
    <div class="col-md-12 misPedidos"></div>
</div>
<script>
$.ajax({
    url:"json/getPedidos.php",
    method:"POST",
    success: function(result){
            if(result!="sin pedidos"){
               var r=JSON.parse(result);
                control_cargarPedidos(r);
            }else{
                control_cargarPedidos(result);
            }
    }
});
</script>