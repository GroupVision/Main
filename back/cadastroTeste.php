<?php

    $ods_grupo = isset($_POST['ckOds']) ? $_POST['ckOds'] : null;

    if($ods_grupo != null){
        for ($i=0; $i < count($ods_grupo); $i++) { 
            if($ods_grupo[$i] != null)
            echo "<p>{$ods_grupo[$i]}</p>";
        }
    }

?>