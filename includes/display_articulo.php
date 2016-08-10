<?php //var_dump($_POST);?>
<div class="col-md-12">
                <div class="col-md-12">
                        <div class="opcion_twitter col-md-4 pull-right">
                              <span>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </span>
                         </div>
            
                </div>
    
                <div class="thumbnail">
                    <img class="img-responsive img-item_display" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full custom_caption-full">
                        <h4 class="pull-right" id="articulo_item-Price"></h4>
                        <h4><a href="#" id="articulo_item-Name"></a>
                        </h4>
                        <p id="articulo_item-Description"></p>
                         
                    </div>
                    <div class="ratings custom_ratings">
                            <p class="pull-right" id="articulo_item-numRatings"></p>
                            <p id="articulo_item-Ratings">

                            </p>
                        </div> 
                     <div class="opciones_displayArticulo" data-id="">
                            <div class="opcion_displayArticulo opcion_añadirArticuloCarrito"><i class="fa fa-shopping-cart" aria-hidden="true">&nbsp;Añadir al carrito</i></div>
                            <div class="opcion_displayArticulo opcion_compararArticulo"><i class="fa fa-list-alt fa-2x" aria-hidden="true">&nbsp;Comparar</i></div>
                            <!--<div class="opcion_displayArticulo compartirTwitter" onclick="control_abrirCompartirDisplay()"><i class="fa fa-share-alt fa-2x" aria-hidden="true">&nbsp;Compartir</i>
                            </div>-->
                         <div class="opciones_compartirDisplay col-md-4 col-md-push-3">
                             <div class=" youtube">
                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/x3Zocdjr5so" frameborder="0" allowfullscreen></iframe>   
                             </div>
                        </div>
                    </div>
                    
                </div>

                <div class="well" id="reviews_container">
                    <div class="toggleReviewContainer" >
                        <div class="text-left">
                            <a class="btn btn-success" onclick="control_toggleLeaveReview();">Leave a Review</a>
                        </div>
                        
                        
                        <div class="leave_Review-target" >
                            <?php session_start();
                            if(isset($_SESSION["email"])){
                                echo '<p>Deja tu comentario aquí abajo!</p>
                                <span class="leave_Review-estrellas"><span><i class="fa fa-star fa-2x" onclick="control_puntuarArticulo(1)" id="estrella-1" aria-hidden="true"></i></span><span><i class="fa fa-star fa-2x" onclick="control_puntuarArticulo(2)" id="estrella-2" aria-hidden="true"></i></span><span ><i class="fa fa-star fa-2x" onclick="control_puntuarArticulo(3)"  id="estrella-3" aria-hidden="true"></i></span><span ><i class="fa fa-star fa-2x" onclick="control_puntuarArticulo(4)" id="estrella-4" aria-hidden="true"></i></span><span ><i class="fa fa-star fa-2x" onclick="control_puntuarArticulo(5)" id="estrella-5" aria-hidden="true"></i></span></span>
                            <div class="leave_Review-comment">
                                <span contenteditable="true" id="review_comment-Input"></span>
                            </div>
                            <a class="btn btn-success leave_Review-submit"  data-valPuntuacion="0">Enviar!</a>';
                            }else{
                                echo '<h3>Inicia sesión para dejar tu review!</h3>';
                            }
                        ?>
                                
                        </div>
                    </div>
                    
                    <hr>

                </div>
    
    

            </div>
<script>
control_cargarDetallesArticulo(<?php echo json_encode($_POST["data"]);?>);
$(document).ready(function() {

    $("#review_comment-Input").focusin(function(event){
        $(".leave_Review-comment").css("border","1px solid #1AAD00");
    });
    $("#review_comment-Input").focusout(function(event){
        $(".leave_Review-comment").css("border","1px solid black");
    }); 
    $(".leave_Review-submit").click(function(){
        control_dejarReview($("#review_comment-Input").html(),$(".leave_Review-submit").attr("data-valPuntuacion"),$(".opciones_displayArticulo").attr("data-id"));
    });
    control_comprobarVotoUsuario($(".opciones_displayArticulo").attr("data-id"));
    var str=$("#articulo_item-Name").html();
    str = str.replace(/\s/g,'');
    $(".twitter-share-button").attr("data-hashtags",str);
    
    $(".opcion_añadirArticuloCarrito").click(function(){
       var datosArticulo=[$(".opciones_displayArticulo").attr("data-id"),$(".img-item_display").attr("src"), $("#articulo_item-Name").html(),$("#articulo_item-Price").html(), $("#articulo_item-Description").html(),$("#articulo_item-numRatings").html(),$("#articulo_item-Ratings").html()];
        control_addArticuloCarrito(datosArticulo); 
    });
    $(".opcion_compararArticulo").click(function(){
        var datosArticulo=[$(".opciones_displayArticulo").attr("data-id"),$(".img-item_display").attr("src"), $("#articulo_item-Name").html(),$("#articulo_item-Price").html(), $("#articulo_item-Description").html(),$("#articulo_item-numRatings").html(),$("#articulo_item-Ratings").html()];
        control_addCompararArticulo(datosArticulo); 
    });
});    


</script>