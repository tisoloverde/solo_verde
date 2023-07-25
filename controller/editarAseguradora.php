<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idAseguradora = $_POST['idAseguradora'];
        $rut = $_POST['rutAseguradora'];
        $nombre = $_POST['nombreAseguradora'];
        $moneda = $_POST['monedaAseguradora'];
        $direccion = $_POST['direccionAseguradora'];
        $comuna = $_POST['comunaAseguradora'];
        $telefono = $_POST['telefonoAseguradora'];

        $row = editarAseguradora( $idAseguradora, $rut, $nombre, $moneda, $direccion,
    $comuna, $telefono);

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
