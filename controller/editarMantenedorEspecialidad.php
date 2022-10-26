<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idEspecialidad = $_POST['idEspecialidad'];
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];

        $row = editarMantenedorEspecialidad($idEspecialidad,$nombre,$codigo);

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