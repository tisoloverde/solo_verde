<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $nombreAgencia = $_POST['nombreAgencia'];
        $idAgencia = $_POST['idAgencia'];

        $row = ingresaAgenciasObras($nombreAgencia,$idAgencia);

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