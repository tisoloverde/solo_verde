<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idRangoMant = $_POST['idRangoMant'];

        foreach ($idRangoMant as $value){
            $row = desactivarRangoMantencion($value);
        }

        if($row != "Error" )
        {
            echo "OK";

        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>