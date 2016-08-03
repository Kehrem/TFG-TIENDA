<!-- 0 -> nombre seccion, 1-> urlimg, 2-> id seccion-->
<?php //var_dump($_POST);?>
<div class="col-md-12">

                <div class="thumbnail">
                    <img class="img-responsive" src="<?php echo $_POST["data"][1]; ?>" alt="">
                </div>
    
    <!--<section class="popular">

        <h3 class="h3title">Más Populares</h3>
        <hr>
        <div class="row populares">

        </div>
        
    </section>
    <section class="mas_vendidos">

        <h3 class="h3title">Más Vendidos</h3>
        <hr>
        <div class="row masVendidos">

        </div>
        
    </section>-->
    <section class="ordenar_articulosCategoria col-md-12">
        <!--<span><h3><?php $n=$_POST["data"][0];$n1=substr($n,1,strlen($n));$n2=substr($n1,0,-1);echo $n2; ?></h3></span>-->
        <span class="metodoOrdenar_articulosCategoria">Ordenar por: <select class="select_ordenarArticulosCategoria" list="opciones_ordenarResultadosPor" >
            <datalist id="opciones_ordenarResultadosPor" >
                <option value="order by veces_vendido desc"> Más Vendidos
                <option value="order by puntuacion desc"> Puntuacion
                <option value="order by nombre asc"> Nombre (A-Z)
                <option value="order by nombre desc"> Nombre (Z-A)
                <option value="order by precio asc"> Precio (Asc.)
                <option value="order by precio desc"> Precio (Desc.)
            </datalist>
            </select>
        </span>
    </section>
    <section class="display_articulos_categoria">

        <!--<h3 class="h3title">Todos (<?php echo $_POST["data"][0]; ?>)</h3>-->
        <hr>
        <div class="row display_ArticulosxCategoria">

        </div>
        
    </section>
    
</div>

<script>
/*control_fetchPopulares(<?php echo $_POST["data"][2];?>);
control_fetchMasVendidos(<?php echo $_POST["data"][2];?>);*/
control_fetchArticulosxCategoria(<?php echo $_POST["data"][2];?>,"order by veces_vendido desc");
$(".select_ordenarArticulosCategoria").change(function(){
    $(".display_ArticulosxCategoria").empty();control_fetchArticulosxCategoria(<?php echo $_POST["data"][2];?>,$(".select_ordenarArticulosCategoria").val());
});
</script>
