<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = 'Error';

        $idOt = $_POST['idOt'];
        $fechaIni = $_POST['fechaIni'];
        $fechaFin = $_POST['fechaFin'];

        $row = asignarFechasTerrenoOts($idOt,$fechaIni,$fechaFin);      

        if($row !== 'Error' )
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
