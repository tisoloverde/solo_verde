<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idresponsable = $_POST['idresponsable'];
        $proyectoEditarResponsableProyecto = $_POST['proyectoEditarResponsableProyecto'];
        $dniEditarResponsableProyecto = $_POST['dniEditarResponsableProyecto'];
        $nombreEditarResponsableProyecto = $_POST['nombreEditarResponsableProyecto'];
        $emailEditarResponsableProyecto = $_POST['emailEditarResponsableProyecto'];
        $fonoEditarResponsableProyecto = $_POST['fonoEditarResponsableProyecto'];


        $row = editarResponsableProyecto($idresponsable, $proyectoEditarResponsableProyecto, $dniEditarResponsableProyecto, $nombreEditarResponsableProyecto, $emailEditarResponsableProyecto,$fonoEditarResponsableProyecto);

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
