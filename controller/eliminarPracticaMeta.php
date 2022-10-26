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

        $row = eliminarMetaPractica($perfil,$mes,$ano,$auditoria);

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
