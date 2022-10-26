<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idMantencion = $_POST['idMantencion'];
        $motivo = $_POST['motivo'];
        $patente = $_POST['patente'];

        $row = actualizarMantencionTaller($idMantencion,$motivo,$patente);

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
