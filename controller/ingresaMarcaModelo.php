<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $litros = $_POST['litros'];


        $row = ingresaMarcaModelo($marca, $modelo, $litros);

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
