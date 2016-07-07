<?php //var_dump($_POST);?>
<div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive img-item_display" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right" id="articulo_item-Price"></h4>
                        <h4><a href="#" id="articulo_item-Name"></a>
                        </h4>
                        <p id="articulo_item-Description"></p>
                        
                    </div>
                    <div class="ratings">
                        <p class="pull-right" id="articulo_item-numRatings"></p>
                        <p id="articulo_item-Ratings">
                            
                        </p>
                    </div>
                </div>

                <div class="well" id="reviews_container">
                    
                    <?php //IF SESION_USUARIO -> ELSE -> NOT SHOW ?>
                    <div class="toggleReviewContainer">
                        <div class="text-left">
                            <a class="btn btn-success" onclick="control_toggleLeaveReview();">Leave a Review</a>
                        </div>
                        
                        <div class="leave_Review-target">
                            <p>Deja tu comentario aquí abajo!</p>
                            <div class="leave_Review-comment">
                                <span contenteditable="true" id="review_comment-Input"></span>
                            </div>
                            <a class="btn btn-success leave_Review-submit" onclick="function(alert('sent');)">Enviar!</a>    
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

});
    
    
    

</script>