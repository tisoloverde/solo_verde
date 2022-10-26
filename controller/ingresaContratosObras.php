<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $nombreContrato = $_POST['nombreContrato'];
        $anoContrato = $_POST['anoContrato'];
        $idContrato = $_POST['idContrato'];

        $row = ingresaContratosObras($nombreContrato,$anoContrato,$idContrato);

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