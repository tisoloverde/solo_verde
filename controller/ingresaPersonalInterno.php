<?php
    //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $rutPersonal = $_POST['rutPersonal'];
        $nombresPersonal = $_POST['nombresPersonal'];
        $apellidosPersonal = $_POST['apellidosPersonal'];
        $nivelFuncional = $_POST['nivelFuncional'];
        $cargo = $_POST['cargo'];
        $clasificacion = $_POST['clasificacion'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $sindicalizado = $_POST['sindicalizado'];
        $fechaNac = $_POST['fechaNac'];
        $idComuna = $_POST['idComuna'];
        $sitMilitar = $_POST['sitMilitar'];
        $estadoCivil = $_POST['estadoCivil'];
        $nacionalidad = $_POST['nacionalidad'];
        $fonoEmergencia = $_POST['fonoEmergencia'];
        $contactoEmergencia = $_POST['contactoEmergencia'];
        $nivelEducacional = $_POST['nivelEducacional'];
        $profesion = $_POST['profesion'];
        $especialidad = $_POST['especialidad'];
        $tipoContrato = $_POST['tipoContrato'];
        $reqUniforme = $_POST['reqUniforme'];
        $cargas = $_POST['cargas'];
        $cantidadCargas = $_POST['cantidadCargas'];
        $planAPV = $_POST['planAPV'];
        $montoAPV = $_POST['montoAPV'];
        $poseeLicencia = $_POST['poseeLicencia'];
        $tipoLicencia = $_POST['tipoLicencia'];
        $sexo = $_POST['sexo'];
        $tallaUniforme = $_POST['tallaUniforme'];
        $idSindicato = $_POST['idSindicato'];
        $tipoJornada = $_POST['tipoJornada'];

        $row = ingresaPersonalInterno($rutPersonal, $nombresPersonal, $apellidosPersonal, $nivelFuncional, $cargo, $clasificacion, $telefono, $direccion,$sindicalizado, $fechaNac, $idComuna, $sitMilitar, $estadoCivil, $nacionalidad, $fonoEmergencia, $contactoEmergencia, $nivelEducacional, $profesion, $especialidad, $tipoContrato, $reqUniforme, $cargas, $cantidadCargas, $planAPV, $montoAPV, $poseeLicencia, $tipoLicencia, $sexo);

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
