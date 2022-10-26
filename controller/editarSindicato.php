<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idSindicato = $_POST['idSindicato'];
        $sindicato = $_POST['sindicato'];
        $descripcion = $_POST['descripcion'];
        
        $row = editarSindicato($idSindicato, $sindicato, $descripcion);

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
