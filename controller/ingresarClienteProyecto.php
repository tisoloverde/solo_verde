<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUser = $_SESSION['rutUser'];

        $rut = $_POST['rut'];
        $cliente = $_POST['cliente'];
        $holding = $_POST['holding'];

        $row = ingresarClienteProyecto($rut, $cliente, $holding, $rutUser);

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
