<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $id_MarcaModelo = $_POST['idTipoVehiculo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $litros = $_POST['litros'];


        $row = editarMarcaModelo( $id_MarcaModelo, $marca, $modelo, $litros);

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
