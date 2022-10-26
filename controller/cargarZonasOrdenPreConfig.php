<?php
    // //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $row = '';

        $proyecto = $_POST['proyecto'];
        $zonas = $_POST['zonas'];
        $row = '';

        for($i = 0; $i < count($zonas); $i++){
          $row = cargarZonasOrdenConfig($proyecto, $zonas[$i]);
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
