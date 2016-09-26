<?php
require_once("../config/general.php");
?>
<div class="col-md-9 col-md-push-1">
    <div class="registro_informacion informacionGeneral">
        
            <h4><?php echo $info_registro["activado"]["titulo"] ?></h4>
            <p><?php echo $info_registro["activado"]["descripcion"]?>
                <br><a href="" onclick="control_cargarMain()">Volver a inicio</a>
            </p>
    </div>
</div>
