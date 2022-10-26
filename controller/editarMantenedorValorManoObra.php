<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $folioValorMO = $_POST['folioValorMO'];
        $comuna = $_POST['comuna'];
        $agencia = $_POST['agencia'];
        $especialidad = $_POST['especialidad'];
        $valor = $_POST['valor'];

        $row = editarMantenedorValorManoObra($folioValorMO,$comuna,$agencia,$especialidad,$valor);

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