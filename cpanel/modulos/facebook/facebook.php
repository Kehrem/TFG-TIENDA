<div class="col-md-12 elementoSpecs">
    <div class="col-md-8 col-md-push2">
        <form  id="facebookSpecs" class="customForm" action="" method="post">
            <span class="col-md-12 contField"><span class="nombreInfo">Nombre: </span><span class="valorInfo"> <input type="text" name="nombreHerramienta" id="nombreHerramienta"></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Tipo: </span><span class="valorInfo"> 
                <select id="herramientasFacebook">
                <option value="Comentarios">
                    Comentarios
                </option>
                <option value="MeGusta">
                    Me Gusta
                </option>
                <option value="Compartir">
                    Compartir
                </option>
                    
                </select></span></span>
            <div class="col-md-12" id="parametrosHerramienta"></div>
            <span class="col-md-12 contField">
            <input type="submit" data-url="<?php echo $_POST["url"]?>" value="Listo!">
            </span>
                
        </form>
    </div>
</div>


<script>
$("#parametrosHerramienta").load("modulos/facebook/"+$("#herramientasFacebook").val()+"/"+$("#herramientasFacebook").val()+".php");
$("#herramientasFacebook").change(function(){
    $("#parametrosHerramienta").load("modulos/facebook/"+$("#herramientasFacebook").val()+"/"+$("#herramientasFacebook").val()+".php");
});  
</script>

<script>

$("#facebookSpecs").submit(function(event){
    event.preventDefault();
    var actualDir=$("#facebookSpecs").find("input[type=submit]").attr("data-url");
    var dir=actualDir.split("/");
    var dirJSON=actualDir.replace(dir[dir.length-1],"");
    var jsonGenerarHerramienta=dirJSON+"/"+$("#herramientasFacebook").val()+"/generar"+$("#herramientasFacebook").val()+".php";
    if($("#nombreHerramienta").val()=="" || $("#nombreHerramienta").val()==" "){
        alert("Debe introducir un nombre");
    }else{
        var arrayDatos=[];
        arrayDatos.push($("#nombreHerramienta").val());
        var inputs=$("#parametrosHerramienta").find("input")
        var selects=$("#parametrosHerramienta").find("select")
        for(var n=0;n<inputs.length;n++){
            arrayDatos.push($(inputs[n]).val());
        }
        for(var m=0;m<selects.length;m++){
            arrayDatos.push($(selects[m]).val());
        }

            $.ajax({
                url: jsonGenerarHerramienta,
                type: "POST",
                data: {params:arrayDatos},
                success: function (msg) {
                    if(msg=="ok"){
                                 abrir_elementosPortada();  
                               }else{
                                   alert("Error al generar el archivo");
                               }
                                
                    
                }
            });
    }
            
});
</script>