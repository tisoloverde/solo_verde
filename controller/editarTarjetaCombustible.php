<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $numero = $_POST['numero'];
        $estado = $_POST['estado'];
        $tipo = $_POST['tipo'];
        $producto = $_POST['producto'];

        $row = editarTarjetaCombustible($numero, $estado, $tipo, $producto);

        if($row == "Ok" )
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
