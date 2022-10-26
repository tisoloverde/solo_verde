<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $folio = $_POST['folio'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        $row = ingresaContactoClienteZonaObra($folio, $correo,$telefono);

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
