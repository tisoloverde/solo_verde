<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $id_Sucursal = $_POST['idSucursal'];
        $sucursal = $_POST['sucursal'];
        $comuna = $_POST['comuna'];
        $bodega = $_POST['bodega'];
        

        $row = editarSucursal( $id_Sucursal, $sucursal, $comuna, $bodega);

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
