<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $descuento = $_POST['descuento'];
        $montoDesc = $_POST['montoDesc'];
        $costoTotal = $_POST['costoTotal'];
        $idSiniestros = $_POST['idSiniestros'];
        $pdfDescDestroy = $_POST['pdfDescDestroy'];

        $row = actualizarDescuentoSiniestros($descuento, $montoDesc, $costoTotal, $idSiniestros, $pdfDescDestroy);

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