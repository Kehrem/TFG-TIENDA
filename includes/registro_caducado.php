<?php
require_once("../config/general.php");
?>
<div class="col-md-9">
    <div class="registro_informacion">
            <h4><?php $info_registro["caducado"][0] ?></h4>
            <p><?php $info_registro["caducado"][1]?>
                <a href="" onclick="control_cargarMain()">Volver a inicio</a>
            </p>
    </div>
</div>