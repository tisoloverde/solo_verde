<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $rutMantencion = $_POST['rutMantencion'];
        $correoPersonal = $_POST['correoPersonal'];
        $celularPersonal = $_POST['celularPersonal'];
        $patenteMantencion = $_POST['patenteMantencion'];
        $kilometraje = $_POST['kilometraje'];
        $fechaMantencion = $_POST['fechaMantencion'];
        $horaMantencion = $_POST['horaMantencion'];
        $motivoMantencion = $_POST['motivoMantencion'];
        $siniestro = $_POST['siniestro'];
        $sucursal = $_POST['sucursal'];
        $colorLetra = $_POST['colorLetra'];
        $colorFondo = $_POST['colorFondo'];
        $observacion = $_POST['observacion'];
        $idTaller = $_POST['idTaller'];

        $row = ingresaMantencionesFlota($rutMantencion, $correoPersonal, $celularPersonal,$patenteMantencion, $kilometraje, $fechaMantencion,
                                        $horaMantencion, $motivoMantencion, $siniestro,$sucursal, $colorLetra, $colorFondo,$observacion,$idTaller);

        if($row != "Error" )
        {
            echo json_encode($row);
        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>