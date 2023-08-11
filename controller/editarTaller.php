<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idTaller = $_POST['idTaller'];
        $rut = $_POST['rutTaller'];
        $nombre = $_POST['nombreTaller'];
        $moneda = $_POST['monedaTaller'];
        $direccion = $_POST['direccionTaller'];
        $comuna = $_POST['comunaTaller'];
        $contacto = $_POST['contactoTaller'];
        $email = $_POST['emailTaller'];
        $telefono = $_POST['telefonoTaller'];

        $row = editarTaller( $idTaller, $rut, $nombre, $moneda, $direccion,
    $comuna, $contacto, $email, $telefono);

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
