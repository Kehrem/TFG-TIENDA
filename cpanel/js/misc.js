function misc_marcarComoLeido(elemento){
    $(elemento).addClass("leido");
    $(elemento).removeClass("noLeido");
    $(elemento).children(0).html("Visto");
    var id=$(elemento).attr("id");
     $.ajax({
        url:"json/marcarComoLeido.php",
        method:"POST",
        data:{id:id},
        success: function(result){
            if(result=="ok"){
               
            }
        }
    });
}