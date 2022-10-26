<?php
    //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idObra = $_POST['idObra'];
        $estado = $_POST['estado'];
        $cantidad = $_POST['cantidad'];

        for($i=0;$i<$cantidad;$i++){
          $row = duplicarOrdenTrabajo($idObra, $estado);
        }

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
