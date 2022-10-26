<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $codigoAgregarMantServicios = $_POST['codigoAgregarMantServicios'];
        $nombreAgregarMantServicios = $_POST['nombreAgregarMantServicios'];
        $marcaAgregarMantServicios = $_POST['marcaAgregarMantServicios'];
        $modeloAgregarMantServicios = $_POST['modeloAgregarMantServicios'];
        $tipoAgregarMantServicios = $_POST['tipoAgregarMantServicios'];
        $precioMinAgregarMantServicios = $_POST['precioMinAgregarMantServicios'];
        $precioMaxAgregarMantServicios = $_POST['precioMaxAgregarMantServicios'];
        $potenciaAgregarMantServicios = $_POST['potenciaAgregarMantServicios'];
        $pesoAgregarMantServicios = $_POST['pesoAgregarMantServicios'];
        $capacidadAgregarMantServicios = $_POST['capacidadAgregarMantServicios'];
        $areaAgregarMantServicios = $_POST['areaAgregarMantServicios'];
        $anchoAgregarMantServicios = $_POST['anchoAgregarMantServicios'];
        $altoAgregarMantServicios = $_POST['altoAgregarMantServicios'];
        $largoAgregarMantServicios = $_POST['largoAgregarMantServicios'];
        $temperaturaAgregarMantServicios = $_POST['temperaturaAgregarMantServicios'];
        $humedadAgregarMantServicios = $_POST['humedadAgregarMantServicios'];
        $presicionAgregarMantServicios = $_POST['presicionAgregarMantServicios'];
        $unidadMedidaAgregarMantServicios = $_POST['unidadMedidaAgregarMantServicios'];
        $gestionAgregarMantServicios = $_POST['gestionAgregarMantServicios'];
        $finanzasAgregarMantServicios = $_POST['finanzasAgregarMantServicios'];
        $subcontratoAgregarMantServicios = $_POST['subcontratoAgregarMantServicios'];
        $observacionAgregarMantServicios = $_POST['observacionAgregarMantServicios'];

        $row = ingresaComprasServicioNuevo($codigoAgregarMantServicios,$nombreAgregarMantServicios,$marcaAgregarMantServicios,$modeloAgregarMantServicios,$tipoAgregarMantServicios,$precioMinAgregarMantServicios,$precioMaxAgregarMantServicios,$potenciaAgregarMantServicios,$pesoAgregarMantServicios,$capacidadAgregarMantServicios,$areaAgregarMantServicios,$anchoAgregarMantServicios,$altoAgregarMantServicios,$largoAgregarMantServicios,$temperaturaAgregarMantServicios,$humedadAgregarMantServicios,$presicionAgregarMantServicios,$unidadMedidaAgregarMantServicios,$gestionAgregarMantServicios,$finanzasAgregarMantServicios,$subcontratoAgregarMantServicios,$observacionAgregarMantServicios);

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
