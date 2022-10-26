<?php
    // //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $dni = $_POST['rut'];
        $apellidos = $_POST['apellidos'];
        $nombres = $_POST['nombres'];
        $cargo = $_POST['funcion'];
        $externo = $_POST['externo'];
        $idpatente = $_POST['patente'];
        $fono = $_POST['fono'];
        $mail = $_POST['mail'];
        $idsubcontrato   = $_POST['empresa'];
        $sucursal = $_POST['sucursal'];
        $nomenclatura = explode("¬¬",$_POST['actividad'])[1];
        $nivel   = $_POST['nivel'];
        $mano   = $_POST['mano'];
        $idCeco = $_POST['idCeco'];

        $row = ingresaPersonalGestOperacion($dni,$apellidos,$nombres,$cargo,$externo,$idpatente,$fono,$mail,$idsubcontrato,$nivel,$mano);

        if($row != "Error" )
        {
            ingresaPersonalGestOperacionACT($dni,$sucursal,$idCeco,$idsubcontrato,$nomenclatura);
            ingresaPersonalGestOperacionPatente($idpatente,$servicio,$cliente,$actividad);
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
