<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idComponenteRemuneracion = $_POST['idComponenteRemuneracion'];

        $row = eliminarComponenteRemuneracion($idComponenteRemuneracion);

        if($row != "error" )
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