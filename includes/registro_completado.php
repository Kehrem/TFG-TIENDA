<?php
require_once("../config/general.php");
?>
<div class="col-md-9">
    <div class="registro_informacion">
        
            <h4><?php echo $info_registro["completado"]["titulo"] ?></h4>
            <p><?php echo $info_registro["completado"]["descripcion"]?>
                <a href="" onclick="control_cargarMain()">Volver a inicio</a>
            </p>
    </div>
</div>
