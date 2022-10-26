<?php
	require('../model/consultas.php');
    session_start();

	if(count($_POST) > 0){

		$idMantencion = $_POST['idMantencion'];
		$patente = $_POST['patente'];
		$motivo = $_POST['motivo'];

		$doc = md5(rand()).'.pdf';

		$docPdfDiagnostico = '';
		$docPdfFactura = '';
        $docPdfOc = '';

        $contadorDiag = '';
        $contadorFactura = '';
        $contadorOc = '';

		$datoPDFvh = consultaDatosPdfMantencion($idMantencion);

		$v = consultaPatenteEspecifica($patente);
		$estadoVeh = $v[0]['IDPATENTE_ESTADO'];
		$tipoVeh = $v[0]['IDPATENTE_TIPOVEHICULO'];
		$propiedad = $v[0]['IDPATENTE_PROPIEDAD'];
		$marcaModelo = $v[0]['IDPATENTE_MARCAMODELO'];
		$proveedor = $v[0]['IDPATENTE_PROVEEDOR'];
		$bodega = $v[0]['IDSUCURSAL'];
		$estructOperac = $v[0]['IDESTRUCTURA_OPERACION'];
		$aseguradora = $v[0]['IDPATENTE_ASEGURADORA'];
		$subcontratista = $v[0]['IDSUBCONTRATISTAS'];
		$kilometraje = $v[0]['KILOMETRAJE'];
		$ano = $v[0]['AÑO'];
		$vin = $v[0]['VIN'];
		$color = $v[0]['IDPATENTE_COLOR'];
		$fInicio = $v[0]['FINICIO'];
		$fTermino = $v[0]['FTERMINO'];
		$tipoMonto = $v[0]['TIPOMONTO'];
		$monto = $v[0]['MONTO'];
		$montoAseg = $v[0]['MONTO_ASEGURADORA'];
		$fMantto = $v[0]['FMANTENIMIENTO'];
		$operacion = $v[0]['OPERACION'];
		$nMotor = $v[0]['NRO_MOTOR'];
		$patenteOriginal = $v[0]['PATENTE_ORIGINAL'];
		$litros = $v[0]['LITROS_ESTANQUE'];

    $v1 = consultaPatenteHistorial($patente);
    $estadoControl = $v1[0]['ESTADO_CONTROL'];
		$estadoRrhh = $v1[0]['ESTADO_PERSONAL'];
		$personalAsig = $v1[0]['PERSONAL'];
		$rutAsig = $v1[0]['DNI'];
    $frealizada = "";
		$fcaducidad = "";
		$frealizadaCir = "";
		$fcaducidadCir = "";
    $docPDFRev1 = "";
    $docPDFCir1 = "";
    $docPDFAsegur1 = "";
    $docPDFOtrosVh1 = "";

		$pdfDiag = $_FILES['pdfDiagnostico']['name'];
    $pdfDiagExt = pathinfo($pdfDiag, PATHINFO_EXTENSION);
    if($pdfDiagExt != ''){
    	$docPdfDiagnostico = 'diagnostico_' . $doc;
		move_uploaded_file($_FILES['pdfDiagnostico']['tmp_name'],'repositorio/flota/mantenciones/diagnostico/diagnostico_' .$doc);
          $contadorDiag = 2;
		ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
		$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
		$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
		$docPDFOtrosVh1, "Se cargó pdf de diagnóstico/mantención", $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPdfDiagnostico = $datoPDFvh[0]['PDF_DIAG'];
          $contadorDiag = $datoPDFvh[0]['CONTADOR_DIAG'];
    }


    $pdfFactura = $_FILES['pdfFactura']['name'];
    $pdfFacturaExt = pathinfo($pdfFactura, PATHINFO_EXTENSION);
    if($pdfFacturaExt != ''){
    	$docPdfFactura = 'factura_' . $doc;
    	move_uploaded_file($_FILES['pdfFactura']['tmp_name'],'repositorio/flota/mantenciones/factura/factura_' . $doc);
          $contadorFactura = 2;
		ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
		$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
		$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
		$docPDFOtrosVh1, "Se cargó pdf de factura/mantención", $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPdfFactura = $datoPDFvh[0]['PDF_FACTURA'];
          $contadorFactura = $datoPDFvh[0]['CONTADOR_FACTURA'];
    }


    $pdfOc = $_FILES['pdfOc']['name'];
    $pdfOcExt = pathinfo($pdfOc, PATHINFO_EXTENSION);
    if($pdfOcExt != ''){
    	$docPdfOc = 'oc_' . $doc;
    	move_uploaded_file($_FILES['pdfOc']['tmp_name'],'repositorio/flota/mantenciones/oc/oc_' . $doc);
          $contadorOc = 2;
		ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
		$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
		$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
		$docPDFOtrosVh1, "Se cargó pdf de Oc/mantención", $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPdfOc = $datoPDFvh[0]['PDF_OC'];
          $contadorOc = $datoPDFvh[0]['CONTADOR_OC'];
    }


		$row = actualizaPDFMantencion($idMantencion, $docPdfDiagnostico, $docPdfFactura, $docPdfOc, $contadorDiag, $contadorFactura, $contadorOc);

		if($row != "Error")
        {
			echo "Ok";
		}
		else{
			echo "Sin datos";
		}
	}
    else{
        echo "Sin datos";
    }

?>
