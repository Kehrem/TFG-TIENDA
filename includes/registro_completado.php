<?php
require_once("../config/general.php");
var_dump($info_registro);
echo "<br>";
var_dump($info_registro[1]);
echo "<br>";
var_dump($info_registro["ya validado"]);
?>
<div class="col-md-9">
    <div class="registro_informacion">
        
            <h4><?php $info_registro[1][0] ?></h4>
            <p><?php $info_registro[1][1]?>
                <a href="" onclick="control_cargarMain()">Volver a inicio</a>
            </p>
    </div>
</div>
