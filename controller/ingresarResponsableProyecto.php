<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $proyectoAgregarResponsableProyecto = $_POST['proyectoAgregarResponsableProyecto'];
        $dniAgregarResponsableProyecto = $_POST['dniAgregarResponsableProyecto'];
        $nombreAgregarResponsableProyecto = $_POST['nombreAgregarResponsableProyecto'];
        $emailAgregarResponsableProyecto = $_POST['emailAgregarResponsableProyecto'];
        $fonoAgregarResponsableProyecto = $_POST['fonoAgregarResponsableProyecto'];


        $row = ingresarResponsableProyecto($proyectoAgregarResponsableProyecto, $dniAgregarResponsableProyecto, $nombreAgregarResponsableProyecto, $emailAgregarResponsableProyecto,$fonoAgregarResponsableProyecto);

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
