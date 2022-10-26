<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $perfil = $_POST['perfil'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $auditoria = $_POST['auditoria'];
        $meta = $_POST['meta'];
        $observacion = $_POST['observacion'];
        $permanente = $_POST['permanente'];
        $ciclo = $_POST['ciclo'];

        $row = editarMetaPractica($perfil,$mes,$ano,$auditoria,$meta,$observacion,$permanente,$ciclo);

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
