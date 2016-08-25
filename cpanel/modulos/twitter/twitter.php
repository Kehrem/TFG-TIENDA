<div class="col-md-12 elementoSpecs">
    <div class="col-md-8 col-md-push2">
        <form  id="twitterSpecs" class="customForm" action="" method="post">
            <span class="col-md-12 contField"><span class="nombreInfo">Nombre: </span><span class="valorInfo"> <input type="text" name="nombreHerramienta" id="nombreHerramienta"></span></span>
            <span class="col-md-12 contField"><span class="nombreInfo">Tipo: </span><span class="valorInfo"> 
                <select id="herramientasTwitter">
                <option value="Hashtag">
                    Hashtag
                </option>
                <option value="Follow">
                    Follow
                </option>
                <option value="Mencion">
                    Mención
                </option>
                <option value="Timeline">
                    Timeline
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
$("#parametrosHerramienta").load("modulos/twitter/"+$("#herramientasTwitter").val()+"/"+$("#herramientasTwitter").val()+".php");
$("#herramientasTwitter").change(function(){
    $("#parametrosHerramienta").load("modulos/twitter/"+$("#herramientasTwitter").val()+"/"+$("#herramientasTwitter").val()+".php");
});  
</script>

<script>

$("#twitterSpecs").submit(function(event){
    event.preventDefault();
    var actualDir=$("#twitterSpecs").find("input[type=submit]").attr("data-url");
    var dir=actualDir.split("/");
    var dirJSON=actualDir.replace(dir[dir.length-1],"");
    var jsonGenerarHerramienta=dirJSON+"/"+$("#herramientasTwitter").val()+"/generar"+$("#herramientasTwitter").val()+".php";
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
                    
                }
            });
    }
            
});
</script>