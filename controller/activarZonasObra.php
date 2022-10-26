<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $row = '';

        $idZonas = $_POST['idZonas'];
        $activa = $_POST['activa'];

        if($activa == '1'){
          $row = activaZonasObra($idZonas);
        }
        else{
          $row = desactivaZonasObra($idZonas);
        }

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
