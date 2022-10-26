<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $nombre = $_POST['nombre'];
        $checktipo = $_POST['checktipo'];
        $licencia = $_POST['licencia'];


        $row = ingresaTipoVehiculo($nombre,$checktipo,$licencia);

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