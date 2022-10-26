<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idEstructura = $_POST['idEstructura'];

        $row = eliminarProyecto($idEstructura);

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
