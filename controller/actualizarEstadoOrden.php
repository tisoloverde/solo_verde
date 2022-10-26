<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idorden = $_POST['idorden'];
        $idestado = $_POST['idestado'];
        $historia = 'Estado actualizado';

        $row = actualizarEstadoOrden($idorden,$idestado);
        $rowOrden = ingresaHistorialOrden($_SESSION['rutUser'], $idorden, $historia);

        if($row == "Ok" )
        {
            echo $row;

        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
