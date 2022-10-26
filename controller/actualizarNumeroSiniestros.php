<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $num_siniestro = $_POST['num_siniestro'];
        $idSiniestros = $_POST['idSiniestros'];

        $row = actualizarNumeroSiniestros( $num_siniestro, $idSiniestros);

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