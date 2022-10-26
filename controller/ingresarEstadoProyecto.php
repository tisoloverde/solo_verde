<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUser = $_SESSION['rutUser'];

        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];

        $row = ingresarEstadoProyecto($estado, $descripcion, $rutUser);

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
