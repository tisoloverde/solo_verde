<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $nombre = $_POST['nombrePerfil'];
        $descripcion = $_POST['descripcionPerfil'];
        $informeDisponibilidad = $_POST['informeDisponibilidad'];
        $informeMetas = $_POST['informeMetas'];


        $row = ingresarPerfil($nombre, $descripcion, $informeDisponibilidad, $informeMetas);

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
