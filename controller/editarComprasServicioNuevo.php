<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $id = $_POST['id'];
        $codigoEditarMantServicios = $_POST['codigoEditarMantServicios'];
        $nombreEditarMantServicios = $_POST['nombreEditarMantServicios'];
        $marcaEditarMantServicios = $_POST['marcaEditarMantServicios'];
        $modeloEditarMantServicios = $_POST['modeloEditarMantServicios'];
        $tipoEditarMantServicios = $_POST['tipoEditarMantServicios'];
        $precioMinEditarMantServicios = $_POST['precioMinEditarMantServicios'];
        $precioMaxEditarMantServicios = $_POST['precioMaxEditarMantServicios'];
        $potenciaEditarMantServicios = $_POST['potenciaEditarMantServicios'];
        $pesoEditarMantServicios = $_POST['pesoEditarMantServicios'];
        $capacidadEditarMantServicios = $_POST['capacidadEditarMantServicios'];
        $areaEditarMantServicios = $_POST['areaEditarMantServicios'];
        $anchoEditarMantServicios = $_POST['anchoEditarMantServicios'];
        $altoEditarMantServicios = $_POST['altoEditarMantServicios'];
        $largoEditarMantServicios = $_POST['largoEditarMantServicios'];
        $temperaturaEditarMantServicios = $_POST['temperaturaEditarMantServicios'];
        $humedadEditarMantServicios = $_POST['humedadEditarMantServicios'];
        $presicionEditarMantServicios = $_POST['presicionEditarMantServicios'];
        $unidadMedidaEditarMantServicios = $_POST['unidadMedidaEditarMantServicios'];
        $gestionEditarMantServicios = $_POST['gestionEditarMantServicios'];
        $finanzasEditarMantServicios = $_POST['finanzasEditarMantServicios'];
        $observacionEditarMantServicios = $_POST['observacionEditarMantServicios'];

        $row = editaComprasServicioNuevo($id,$codigoEditarMantServicios,$nombreEditarMantServicios,$marcaEditarMantServicios,$modeloEditarMantServicios,$tipoEditarMantServicios,$precioMinEditarMantServicios,$precioMaxEditarMantServicios,$potenciaEditarMantServicios,$pesoEditarMantServicios,$capacidadEditarMantServicios,$areaEditarMantServicios,$anchoEditarMantServicios,$altoEditarMantServicios,$largoEditarMantServicios,$temperaturaEditarMantServicios,$humedadEditarMantServicios,$presicionEditarMantServicios,$unidadMedidaEditarMantServicios,$gestionEditarMantServicios,$finanzasEditarMantServicios,$observacionEditarMantServicios);

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
