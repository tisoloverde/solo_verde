<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idContratosObras = $_POST['idContratosObras'];
        $nombre = $_POST['nombre'];
        $ano = $_POST['ano'];
        $idContrato = $_POST['idContrato'];

        $row = editarContratosObras($idContratosObras,$nombre,$ano,$idContrato);

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