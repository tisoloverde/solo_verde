<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $nombre = $_POST['nombre'];
        $codigoUo = $_POST['codigoUo'];
        $codigoMat = $_POST['codigoMat'];
        $valor = $_POST['valor'];
        $proveedor = $_POST['proveedor'];
        $codCliente = $_POST['codCliente'];
        $um = $_POST['um'];
        $cod1 = $_POST['cod1'];
        $cod2 = $_POST['cod2'];
        $cod3 = $_POST['cod3'];

        $row = ingresaMantenedorUnidadObra($nombre,$codigoUo,$codigoMat,$valor,$proveedor,$codCliente,$um,$cod1,$cod2,$cod3);

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
