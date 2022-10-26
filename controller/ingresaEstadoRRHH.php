<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUsuario = '';
        if (array_key_exists('rutUser', $_SESSION)) {
            $rutUsuario = $_SESSION['rutUser'];
            $tipo = $_POST['tipo'];
            $observacion = $_POST['observacion'];
            $ini = $_POST['ini'];
            $fin = $_POST['fin'];
            $rut = $_POST['rut'];
            $tipoTexto = $_POST['tipoTexto'];

            if($tipoTexto == "Desvinculado" || $tipoTexto == "Renuncia" || $tipoTexto == "Vigente"){
              $row = ingresarEstadoDesvinculado($rut, $tipo, $ini, $observacion, $rutUsuario);
            }
            else{
              $row = ingresarEstadoRRHH($rut, $tipo, $ini, $fin, $observacion, $rutUsuario);
            }

            if($row != "Error" )
            {
              echo "Ok";
            }
            else{
                echo "Sin datos";
            }
        }
        else{
        	echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
