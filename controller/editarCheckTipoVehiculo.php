<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $folio = $_POST['folio'];
        $item = $_POST['item'];
        $tipo = $_POST['tipo'];
        $indispensable = $_POST['indispensable'];
        $descontable = $_POST['descontable'];

        $row = editarCheckTipoVehiculo($folio,$item,$tipo,$indispensable,$descontable);

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