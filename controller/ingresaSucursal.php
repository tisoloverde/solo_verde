<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $sucursal = $_POST['sucursalIngreso'];
        $idAreaFuncional = $_POST['comuna'];
        $bodega = $_POST['bodega'];


        $row = ingresaSucursal($sucursal, $idAreaFuncional, $bodega);

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