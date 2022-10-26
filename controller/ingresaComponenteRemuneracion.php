<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $concepto = $_POST['concepto'];
        $tipo = $_POST['tipo'];
        $liquidacion = $_POST['liquidacion'];
        $orden = $_POST['orden'];

        $checkComponente = checkComponenteRemuneracion($concepto);
        if($checkComponente["existe"] > 0){
            echo "EXISTE";
        }else{
            $row = ingresarComponenteRemuneracion($concepto, $tipo, $liquidacion, $orden);

            if($row != "Error" )
            {
                echo "OK";

            }
            else{
                echo "Sin datos";
            }   
        }
    }
    else{
        echo "Sin datos";
    }
?>
