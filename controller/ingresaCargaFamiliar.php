<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $rutCarga = $_POST['rutCarga'];
        $rutPersonal = $_POST['rutPersonal'];
        $nombreCarga = $_POST['nombreCarga'];
        $fechaNac = $_POST['fechaNac'];
        $parentesco = $_POST['parentesco'];


        $row = ingresaCargaFamiliar($rutPersonal, $rutCarga, $nombreCarga, $fechaNac, $parentesco);

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
