<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $row2 = '';
        
        $rutPExterno = $_POST['rutPExterno'];
        $apellidosPExterno = $_POST['apellidosPExterno'];
        $nombresPExterno = $_POST['nombresPExterno'];
        $fechaNac = $_POST['fechaNac'];
        $sexoIngreso = $_POST['sexoIngreso'];
        $estadoCivil = $_POST['estadoCivil'];
        $sitMilitar = $_POST['sitMilitar'];
        $telefono = $_POST['telefono'];
        $telefonoEmergencia = $_POST['telefonoEmergencia'];
        $contacto = $_POST['contacto'];
        $nacionalidad = $_POST['nacionalidad'];
        $ceco = $_POST['ceco'];
        $contrato = $_POST['contrato'];
        $cliente = $_POST['cliente'];
        $actividad = $_POST['actividad'];
        $fechaIngreso = $_POST['fechaIngreso'];
        $clasificacion = $_POST['clasificacion'];
        $cargo = $_POST['cargo'];
        $nivel = $_POST['nivel'];
        $tipoContrato = $_POST['tipoContrato'];
        $requiereUniforme = $_POST['requiereUniforme'];
        $tallaIngreso = $_POST['tallaIngreso'];
        $poseeLicencia = $_POST['poseeLicencia'];
        $tipoLicencia = $_POST['tipoLicencia'];
        $sucursal = $_POST['sucursal'];
        $tipoJornada = $_POST['tipoJornada'];
        $subcontrato = $_POST['subcontrato'];

        $row = ingresaPExterno($rutPExterno, $apellidosPExterno,$nombresPExterno,$fechaNac,$sexoIngreso,$estadoCivil,$sitMilitar,$telefono,$telefonoEmergencia,$contacto,$nacionalidad,$ceco,$contrato,$cliente,$actividad,$fechaIngreso,$clasificacion,$cargo,$nivel,$tipoContrato,$requiereUniforme,$tallaIngreso,$poseeLicencia,$tipoLicencia,$sucursal,$tipoJornada,$subcontrato);

        if($row == "Ok" )
        {
          $row2 = ingresaDatosEstructura($rutPExterno,$cliente,$contrato,$actividad,$sucursal,$ceco);
          if($row2 == "Ok" ){
            echo "OK";
          }
          else{
              echo "Sin datos";
          }
        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
