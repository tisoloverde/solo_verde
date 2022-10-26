<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $comuna = $_POST['comuna'];
        $agencia = $_POST['agencia'];
        $especialidad = $_POST['especialidad'];
        $valor = $_POST['valor'];

        $row = ingresaMantenedorValorManoObra($comuna,$agencia,$especialidad,$valor);

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
