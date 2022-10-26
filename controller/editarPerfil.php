<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $rut = $_SESSION['rutUser'];
        $nombre = $_POST['nombre'];
        $idPerfil = $_POST['idPerfil'];
        $descripcion = $_POST['descripcion'];
        $informeDisponibilidad = $_POST['informeDisponibilidad'];
        $informeMetas = $_POST['informeMetas'];

        $row = editarPerfil($nombre, $idPerfil, $descripcion, $informeDisponibilidad, $informeMetas);

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
