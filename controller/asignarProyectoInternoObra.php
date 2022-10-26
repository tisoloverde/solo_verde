<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $proyecto = $_POST['proyecto'];
        $datos1 = json_decode($proyecto, true);
        foreach ($datos1 as $value){
            $folio = $value['id'];
            $proyectoInterno = $value['proy'];
            $row = asignarProyectoInternoObra($folio,$proyectoInterno);
        }

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
