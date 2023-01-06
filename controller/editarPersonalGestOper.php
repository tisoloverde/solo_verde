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
        $idsubcontrato = $_POST['empresa'];
        $sucursal = $_POST['sucursal'];
        $nomenclatura = explode("¬¬",$_POST['actividad'])[1];
        $patAnterior   = $_POST['patAnterior'];
        $nivel   = $_POST['nivel'];
        $mano   = $_POST['mano'];
        $idCeco = $_POST['idCeco'];

        if($idCeco == ""){
          $idCeco = -1;
        }

        editaPersonalGestOperacionPatente($patAnterior);

        $row = editaPersonalGestOperacion($dni,$apellidos,$nombres,$cargo,$externo,$idpatente,$fono,$mail,$idsubcontrato,$nivel,$mano);

        if($row != "Error" )
        {
            $row2 = editaPersonalGestOperacionACT($dni,$sucursal,$idCeco,$idSubcontrato,$nomenclatura);
            ingresaPersonalGestOperacionPatente($idpatente,$servicio,$cliente,$actividad);

            var_dump($row2);

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
