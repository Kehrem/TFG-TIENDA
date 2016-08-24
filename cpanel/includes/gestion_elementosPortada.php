<div class="col-md-12">
    <h1 class="bigOne ">Configuracion Portada</h1>
    <div class="col-md-12 row contGeneral" id="contGestionElementosPortada" >
        <span class="h2Cont col-md-12"><h1>Preview Elemento</h1></span>
        
        <div class="col-md-12 previewElemento">
        
        </div>
        <span class="h2Cont col-md-12"><h1>Lista Elementos</h1></span>
        <div class="col-md-12 rowsElementos">

        </div>
        <span class="h1Cont col-md-12"><h1>Añadir Elemento</h1></span>
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
                    var trash='<i onclick="gestion_eliminarElemento(this)" data-ident="'+value["ident"]+'" class="fa fa-trash" aria-hidden="true"></i>';
                    if(value["activo"]==0){
                        activo='<i onclick="gestion_activarElemento(this)" data-ident="'+value["ident"]+'" data-url="'+value["url"]+'" class="fa fa-square-o" aria-hidden="true"></i>';
                    }else{
                       activo='<i onclick="gestion_activarElemento(this)" data-ident="'+value["ident"]+'" data-url="'+value["url"]+'" class="fa fa-check-square-o" aria-hidden="true"></i>';
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
