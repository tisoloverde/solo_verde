<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $proveedor = $_POST['nombre'];
        $rut = $_POST['rutProveedores'];
        $propiedad = $_POST['propiedad'];
        $contrato = $_POST['contrato'];


        $row = ingresaProveedores($rut, $proveedor, $propiedad, $contrato);

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
