<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $row = '';

        $idEspecialidad = $_POST['idEspecialidad'];


        $row = eliminarMantenedorEspecialidad($idEspecialidad);

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