<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $id_TipoVehiculo = $_POST['idTipoVehiculo'];
        $nombre = $_POST['nombre'];
        $licencia = $_POST['licencia'];
        $checktipo = $_POST['checktipo'];

        $row = editarTipoVehiculo( $id_TipoVehiculo, $nombre, $licencia,$checktipo);

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
