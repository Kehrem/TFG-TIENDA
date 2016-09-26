<?php
require_once("../config/general.php");
?>
<div class="col-md-9 col-md-push-1">
    <div class="registro_informacion">
        
            <h4><?php echo $info_registro["caducado"]["titulo"] ?></h4>
            <p><?php echo $info_registro["caducado"]["descripcion"]?>
                <br><a href="" onclick="control_cargarMain()">Volver a inicio</a>
            </p>
    </div>
</div>
