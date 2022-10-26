<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $minutos = $_POST['minutos'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];

        $row = ingresaRangoMantenciones($minutos, $horaInicio, $horaFin);

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