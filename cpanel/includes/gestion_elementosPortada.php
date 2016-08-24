<div class="col-md-12">
    <h1>Configuracion Portada</h1>
    <div class="col-md-12 row contGeneral" id="contGestionElementosPortada" >
        <h1>Elementos</h1>
        <div class="col-md-12 previewElemento"></div>
        
        <div class="col-md-12 rowsElementos">

        </div>
        <h1>Añadir Elemento</h1>
        <div class="col-md-12 nuevoElementoPortada addNuevo "><i class="fa fa-plus fa-3x" onclick='gestion_nuevoElementoPortada();' aria-hidden="true"></i></div>
        <div class="col-md-8 col-md-push-2" id="contTiposElementosPortada"> 
        </div>
        <div class="col-md-12" id="parametrosElementoPortada">
            
        </div>
    </div>
</div>
<script>
    
  $.ajax({
        url: "json/getElementos.php",
        method: "POST",
        success: function (msg) {
            if(msg!="sin resultados"){
                var n=JSON.parse(msg);
                var def=1;
                var defInc="";
                $.each(n,function(key,value){
                    var activo='';
                    var trash='<i data-ident="'+value["ident"]+'" class="fa fa-trash" aria-hidden="true"></i>';
                    if(value["activo"]==0){
                        activo='<i data-url="'+value["url"]+'" class="fa fa-square-o" aria-hidden="true"></i>';
                    }else{
                       activo='<i data-url="'+value["url"]+'" class="fa fa-check-square-o" aria-hidden="true"></i>';
                    }
                    var cl='';
                    if(def==1){
                        cl='elementoActivo';
                        def=0;
                        defInc=value["url"];
                    }
                    var row="<div class='rowElemento "+cl+" col-md-12'>"+value["nombre"]+"&nbsp;&nbsp;"+activo+"&nbsp;&nbsp;"+trash+"</div>";
                     $(".rowsElementos").append(row);
                });
                $(".previewElemento").load(defInc);
            }else{
                $(".rowsElementos").html("<h3>No Hay Elementos!</h3>");
            }
        }
    });
</script>
