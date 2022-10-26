<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $row = '';

        $idsConfiguracion = $_POST['idsConfiguracion'];


        $row = eliminarIncidenciaConfiguracion($idsConfiguracion);

        if($row == "Ok" )
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