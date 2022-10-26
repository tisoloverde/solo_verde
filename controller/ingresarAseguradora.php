
<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $nombre = $_POST['nombre'];
        $moneda = $_POST['moneda'];

        $row = ingresaCargaFamiliar($nombre, $moneda);

        if($row == "Ok" )
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