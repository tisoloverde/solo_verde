<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idusuario = $_POST['idusuario'];
        $ordenes = $_POST['ordenes'];
        $historia = 'Tecnico actualizado';

        for($i = 0; $i < count($ordenes); $i++){
          $row = actualizarTecnicoOrden($idusuario, $ordenes[$i]);
          $rowOrden = ingresaHistorialOrden($_SESSION['rutUser'], $ordenes[$i], $historia);
        }

        if($row == "Ok" )
        {
            echo $row;

        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
