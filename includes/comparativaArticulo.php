<div class="thumbnail" data-id="<?php echo $_POST["data"][0]?>">
                    <img class="img-responsive img-item_display" src="<?php echo $_POST["data"][1]?>" alt="">
                    <div class="caption-full custom_caption-full">
                        <h4 class="pull-right" id="articulo_item-Price"><?php echo $_POST["data"][3]?>€</h4>
                        <h4><a href="#" id="articulo_item-Name"><?php echo $_POST["data"][2]?></a>
                        </h4>
                        <p id="articulo_item-Description"><?php echo $_POST["data"][4]?></p>
                         
                    </div>
                    <div class="ratings custom_ratings">
                            <p class="pull-right" id="articulo_item-numRatings"><?php echo $_POST["data"][5]?></p>
                            <p id="articulo_item-Ratings">
                                <?php echo $_POST["data"][6]?>
                            </p>
                        </div> 
                     <div class="opciones_displayArticulo" data-id="">
                            <div class="opcion_displayArticulo_compare"><i class="fa fa-shopping-cart" aria-hidden="true">&nbsp;Añadir al carrito</i></div>
                    </div>
                    
                </div>

<script>
</script>