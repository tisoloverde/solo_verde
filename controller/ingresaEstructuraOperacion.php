<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUsuario = $_SESSION['rutUser'];
        $area = $_POST['area'];
        $nomenclatura = $_POST['nomenclatura'];
        $idarea = $_POST['idarea'];
        $existeServicio = false;
        $existeCliente = false;
        $existeActividad = false;
        if(isset($_POST['servicioExistente'])){
            $idServicio = $_POST['servicioExistente'];
        }else if(isset($_POST['servicioNuevo'])){
            $servicio = $_POST['servicioNuevo'];
            $checkServicio = checkServicio($servicio);
            if($checkServicio["existe"] > 0){
                $existeServicio = true;
            }
        }
        if(isset($_POST['clienteExistente'])){
            $idCliente = $_POST['clienteExistente'];
        }else if(isset($_POST['clienteNuevo'])){
            $cliente = $_POST['clienteNuevo'];
            $checkCliente = checkCliente($cliente);
            if($checkCliente["existe"] > 0){
                $existeCliente = true;
            }
        }
        if(isset($_POST['actividadExistente'])){
            $idActividad = $_POST['actividadExistente'];
        }else if(isset($_POST['actividadNuevo'])){
            $actividad = $_POST['actividadNuevo'];
            $checkActividad = checkActividad($actividad);
            if($checkActividad["existe"] > 0){
                $existeActividad = true;
            }
        }
        if($existeServicio){
            echo "EXISTESERVICIO";
            return;
        }else if($existeCliente){
            echo "EXISTECLIENTE";
            return;
        }else if($existeActividad){
            echo "EXISTEACTIVIDAD";
            return;
        }else{
          if(!isset($_POST['servicioExistente'])){
            //Insercion servicio
            $rowServicio = ingresarServicio($servicio);
            if($rowServicio["msg"] == "Ok"){
                $idServicio = $rowServicio["idServicio"];
            }else{
                echo "Sin datos";
                return;
            }
          }
          if(!isset($_POST['clienteExistente'])){
            //Insercion cliente
            $rowCliente = ingresarCliente($cliente);
            if($rowCliente["msg"] == "Ok"){
                $idCliente = $rowCliente["idCliente"];
            }else{
                echo "Sin datos";
                return;
            }
          }
          if(!isset($_POST['actividadExistente'])){
            //Insercion actividad
            $rowActividad = ingresarActividad($actividad);
            if($rowActividad["msg"] == "Ok"){
                $idActividad = $rowActividad["idActividad"];
            }else{
                echo "Sin datos";
                return;
            }
          }
        }

        $idsubcontratista = $_POST['subcontratista'];
        $nombre = $_POST['nombre'];

        $checkEstructuraOperacion = checkEstructuraOperacion($idCliente, $idServicio, $idActividad, $nomenclatura, $idsubcontratista);
        if($checkEstructuraOperacion["existe"] > 0){
            echo "EXISTE";
        }else{
            $row = ingresarEstructuraOperacion($idCliente, $idServicio, $idActividad, $nomenclatura, $idsubcontratista, $nombre, $idarea, $rutUsuario);
            if($row != 'Error'){
                echo "OK";
            }else{
                echo "Sin datos";
            }
        }
    }else{
        echo "Sin datos";
    }
?>
