<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUser = $_SESSION['rutUser'];

        $id = $_POST['id'];
        $patente = $_POST['patente'];

        $row = actualizarSiniestroPatente($id, $patente);

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
