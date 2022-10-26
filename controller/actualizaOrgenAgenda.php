<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $fechaAgenda = $_POST['fechaAgenda'];
        $horaAgenda = $_POST['horaAgenda'];
        $idTramo = $_POST['idTramo'];
        $fono = $_POST['fono'];
        $idOrden = $_POST['idOrden'];
        $historia = 'Agenda actualizada';

        $row = actualizaOrdenAgenda($fechaAgenda,$horaAgenda,$idTramo,$fono,$idOrden);
        $rowOrden = ingresaHistorialOrden($_SESSION['rutUser'], $idOrden, $historia);

        if($row == "Ok" )
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
