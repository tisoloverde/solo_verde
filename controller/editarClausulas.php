<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idClausulas = $_POST['idClausulas'];
        $clausula = $_POST['clausula'];

        $row = editarClausulas( $idClausulas, $clausula);

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