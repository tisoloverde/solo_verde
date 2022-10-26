<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $especialidad = $_POST['especialidad'];
        $codEspecialidad = $_POST['codEspecialidad'];

        $row = ingresaMantenedorEspecialidad($especialidad,$codEspecialidad);

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