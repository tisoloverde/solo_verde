<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $rut = $_SESSION['rutUser'];
        $rutEditar = $_POST['rutEditar'];
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $interno = $_POST['interno'];

        $row = editarSubcontratista( $rutEditar, $nombre, $estado, $interno);

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
