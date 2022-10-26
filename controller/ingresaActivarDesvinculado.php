<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUsuario = '';
        if (array_key_exists('rutUser', $_SESSION)) {
          $rutUsuario = $_SESSION['rutUser'];
          $rut = $_POST['rut'];
          $observacion = $_POST['observacion'];


          $row = activarDesvinculado($rut, $observacion, $rutUsuario);

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
