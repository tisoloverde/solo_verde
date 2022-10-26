<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $sindicato = $_POST['sindicato'];
        $descripcion = $_POST['descripcion'];

        $checkSindicato = checkSindicato($sindicato);
        if($checkSindicato["existe"] > 0){
            echo "EXISTE";
        }else{
            $row = ingresarSindicato($sindicato, $descripcion);

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
