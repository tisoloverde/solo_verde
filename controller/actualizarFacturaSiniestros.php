<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $num_factura = $_POST['num_factura'];
        $idSiniestros = $_POST['idSiniestros'];

        $row = actualizarFacturaSiniestros( $num_factura, $idSiniestros);

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