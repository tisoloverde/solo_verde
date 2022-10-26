<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $id_Proveedores = $_POST['idProveedores'];
        $nombre = $_POST['nombre'];
        $rut = $_POST['rutProveedores'];
        $propiedad = $_POST['propiedad'];
        $contrato = $_POST['contrato'];


        $row = editarProveedores( $id_Proveedores, $rut, $nombre, $propiedad, $contrato);

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
