<?php
	require('../model/consultas.php');
    session_start();

	if(count($_POST) > 0){

		$patente = $_POST['patente'];
		$frealizada = $_POST['fRealizadaRevTec'];
		$fcaducidad = $_POST['fCaducidadRevTec'];
		$frealizadaCir = $_POST['fRealizaPermCirc'];
		$fcaducidadCir = $_POST['fCaducidadPermCirc'];
		$fRealizadaEmisionGases = $_POST['fRealizadaEmisionGases'];
		$fCaducidadEmisionGases = $_POST['fCaducidadEmisionGases'];
		$doc = md5(rand()).'.pdf';
		$docPDFRev = '';
		$docPDFCir = '';
		$docPDFEmisionGases = '';
		$docPDFAsegur = '';
		$docPDFOtrosVh = '';

		$v1 = consultaPatenteHistorial($patente);
    $estadoControl = $v1[0]['ESTADO_CONTROL'];
		$estadoRrhh = $v1[0]['ESTADO_PERSONAL'];
		$personalAsig = $v1[0]['PERSONAL'];
		$rutAsig = $v1[0]['DNI'];


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

		$datoPDFvh = consultaPDFVehiculoPatente($patente);

		$pdfRev = $_FILES['pdfRevTec']['name'];
    $pdfRevExt = pathinfo($pdfRev, PATHINFO_EXTENSION);
    if($pdfRevExt != ''){
    	$docPDFRev = 'revTecnica_' . $doc;
			move_uploaded_file($_FILES['pdfRevTec']['tmp_name'],'repositorio/flota/revTecnica/revTecnica_' .$doc);
			$mensaje = "Se ingreso PDF de Rev. Tec.";
			$docPDFRev1 = "Se cargo PDF";
			ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
			$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
			$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
			$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPDFRev = $datoPDFvh[0]['PDFREVTEC'];
			$frealizada = $datoPDFvh[0]['FREALIZADAREVTEC'];
			$fcaducidad = $datoPDFvh[0]['FCADUCIDADREVTEC'];
    }


    $pdfCir = $_FILES['pdfPermCirc']['name'];
    $pdfCirExt = pathinfo($pdfCir, PATHINFO_EXTENSION);
    if($pdfCirExt != ''){
    	$docPDFCir = 'perCirculacion_' . $doc;
    	move_uploaded_file($_FILES['pdfPermCirc']['tmp_name'],'repositorio/flota/perCirculacion/perCirculacion_' . $doc);
			$mensaje = "Se ingreso PDF de Perm. Circ.";
			$docPDFCir1 = "Se cargo PDF";
			ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
			$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
			$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
			$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPDFCir = $datoPDFvh[0]['PDFPERMCIRC'];
			$frealizadaCir = $datoPDFvh[0]['FREALIZADAPERMCIRC'];
			$fcaducidadCir = $datoPDFvh[0]['FCADUCIDADPERMCIRC'];
    }

		$pdfEmisionGases = $_FILES['pdfEmisionGases']['name'];
    $pdfEmisionGasesExt = pathinfo($pdfEmisionGases, PATHINFO_EXTENSION);
    if($pdfEmisionGasesExt != ''){
    	$docPDFEmisionGases = 'emisionGases_' . $doc;
			move_uploaded_file($_FILES['pdfEmisionGases']['tmp_name'],'repositorio/flota/emisionGases/emisionGases_' .$doc);
			$mensaje = "Se ingreso PDF de Emision Gases";
			$docPDFEmisionGases1 = "Se cargo PDF";
			ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
			$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
			$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
			$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPDFEmisionGases = $datoPDFvh[0]['PDFEMISIONGASES'];
			$fRealizadaEmisionGases = $datoPDFvh[0]['FREALIZADAEMISIONGASES'];
			$fCaducidadEmisionGases = $datoPDFvh[0]['FCADUCIDADEMISIONGASES'];
    }

    $pdfAsegur = $_FILES['pdfAseg']['name'];
    $pdfAsegurExt = pathinfo($pdfAsegur, PATHINFO_EXTENSION);
    if($pdfAsegurExt != ''){
    	$docPDFAsegur = 'aseguradora_' . $doc;
    	move_uploaded_file($_FILES['pdfAseg']['tmp_name'],'repositorio/flota/aseguradora/aseguradora_' . $doc);
		$mensaje = "Se ingreso PDF de Aseguradora";
		$docPDFAsegur1 = "Se cargo PDF";
		ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
		$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
		$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
		$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPDFAsegur = $datoPDFvh[0]['PDFASEG'];
    }


    $pdfOtrosVh = $_FILES['pdfOtros']['name'];
    $pdfOtrosVhExt = pathinfo($pdfOtrosVh, PATHINFO_EXTENSION);
    if($pdfOtrosVhExt != ''){
    	$docPDFOtrosVh = 'otros_' . $doc;
    	move_uploaded_file($_FILES['pdfOtros']['tmp_name'],'repositorio/flota/otros/otros_' . $doc);
		$mensaje = "Se ingreso PDF de Otros";
		$docPDFOtrosVh1 = "Se cargo PDF";
		ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
		$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
		$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
		$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
    }
    else{
    	$docPDFOtrosVh = $datoPDFvh[0]['PDFOTROS'];
    }


		$row = actualizaPDFVehiculo($patente, $frealizada, $fcaducidad, $docPDFRev, $frealizadaCir, $fcaducidadCir, $docPDFCir, $docPDFAsegur, $docPDFOtrosVh, $docPDFEmisionGases, $fRealizadaEmisionGases, $fCaducidadEmisionGases);

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
