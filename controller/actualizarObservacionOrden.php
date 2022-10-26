<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idorden = $_POST['idorden'];
        $observacion = $_POST['observacion'];
        $historia = 'Observación ingresada';

        $row = actualizarObservacionOrden($idorden,$observacion);
        $rowOrden = ingresaHistorialOrdenObs($_SESSION['rutUser'], $idorden, $historia,$observacion);

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
