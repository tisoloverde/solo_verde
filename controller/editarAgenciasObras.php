<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idAgenciasObras = $_POST['idAgenciasObras'];
        $nombre = $_POST['nombre'];
        $idAgencia = $_POST['idAgencia'];

        $row = editarAgenciasObras($idAgenciasObras,$nombre,$idAgencia);

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