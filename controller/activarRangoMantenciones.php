<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idRangoMant = $_POST['idRangoMant'];
        $tope = $_POST['tope'];

        foreach ($idRangoMant as $value){
            $row = activarRangoMantencion($value, $tope);
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