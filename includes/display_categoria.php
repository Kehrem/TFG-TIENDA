<!-- 0 -> nombre seccion, 1-> urlimg, 2-> id seccion-->
<?php //var_dump($_POST);?>
<div class="col-md-12">

                <div class="thumbnail">
                    <img class="img-responsive" src="<?php echo $_POST["data"][1]; ?>" alt="">
                </div>
    
    <section class="popular">

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
        
    </section>
    <section class="display_articulos_categoria">

        <h3 class="h3title">Todos (<?php echo $_POST["data"][0]; ?>)</h3>
        <hr>
        <div class="row display_ArticulosxCategoria">

        </div>
        
    </section>
    
</div>

<script>
control_fetchPopulares(<?php echo $_POST["data"][2];?>);
control_fetchMasVendidos(<?php echo $_POST["data"][2];?>);
control_fetchArticulosxCategoria(<?php echo $_POST["data"][2];?>);
</script>
