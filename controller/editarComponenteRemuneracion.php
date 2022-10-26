<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idComponenteRemuneracion = $_POST['idComponenteRemuneracion'];
        $concepto = $_POST['concepto'];
        $tipo = $_POST['tipo'];
        $liquidacion = $_POST['liquidacion'];
        $orden = $_POST['orden'];


        $row = editarComponenteRemuneracion($idComponenteRemuneracion, $concepto, $tipo, $liquidacion, $orden);

        if($row != "error" )
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