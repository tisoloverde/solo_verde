<?php
	require('../model/consultas.php');
    session_start();

	if(count($_POST) > 0){

		$idSiniestro = $_POST['idSiniestro'];
		$doc = md5(rand()).'.pdf';
		$docPDFSiniestro = '';
		$docPDFDeclaracion = '';
		$docPDFDeclaAseg = '';
    $docPDFLicencia = '';
		$docPDFDescuento = '';
    $contadorSiniestro = '';
    $contadorDeclaracion= '';
    $contadorDeclaAseg = '';
    $contadorLicencia = '';
    $contadorDescuento = '';

		$datoPDFSin = consultaDatosPdfSiniestro($idSiniestro);

		$pdfSiniestro = $_FILES['pdfSiniestro']['name'];
    $pdfSiniestroExt = pathinfo($pdfSiniestro, PATHINFO_EXTENSION);
    if($pdfSiniestroExt != ''){
    	$docPDFSiniestro = 'siniestroFirmada_' . $doc;
			move_uploaded_file($_FILES['pdfSiniestro']['tmp_name'],'repositorio/flota/siniestros/formulario/siniestroFirmada_' .$doc);
      $contadorSiniestro = 2;
    }
    else{
    	$docPDFSiniestro = $datoPDFSin[0]['PDF_SINIESTRO'];
          $contadorSiniestro = $datoPDFSin[0]['CONTADOR_SINIESTRO'];
    }


    $pdfDeclaracion = $_FILES['pdfDeclaracion']['name'];
    $pdfDeclaracionExt = pathinfo($pdfDeclaracion, PATHINFO_EXTENSION);
    if($pdfDeclaracionExt != ''){
    	$docPDFDeclaracion = 'declaracionFirmada_' . $doc;
		move_uploaded_file($_FILES['pdfDeclaracion']['tmp_name'],'repositorio/flota/siniestros/declaracion/declaracionFirmada_' .$doc);
          $contadorDeclaracion = 2;
    }
    else{
    	$docPDFDeclaracion = $datoPDFSin[0]['PDF_DECLARACION'];
          $contadorDeclaracion = $datoPDFSin[0]['CONTADOR_DECLARACION'];
    }


    $pdfDeclAseg = $_FILES['pdfDeclAseg']['name'];
    $pdfDeclAsegExt = pathinfo($pdfDeclAseg, PATHINFO_EXTENSION);
    if($pdfDeclAsegExt != ''){
    	$docPDFDeclaAseg = 'declAsegFirmada_' . $doc;
		move_uploaded_file($_FILES['pdfDeclAseg']['tmp_name'],'repositorio/flota/siniestros/declaAseg/declAsegFirmada_' .$doc);
          $contadorDeclaAseg = 2;
    }
    else{
    	$docPDFDeclaAseg = $datoPDFSin[0]['PDF_DECLARACION_ASEG'];
          $contadorDeclaAseg = $datoPDFSin[0]['CONTADOR_DECL_ASEG'];
    }
          /////
      $pdfLicencia = $_FILES['pdfLicencia']['name'];
    $pdfLicenciaExt = pathinfo($pdfLicencia, PATHINFO_EXTENSION);
    if($pdfLicenciaExt != ''){
    	$docPDFLicencia = 'licenciaFirmada_' . $doc;
		move_uploaded_file($_FILES['pdfLicencia']['tmp_name'],'repositorio/flota/siniestros/licencia/licenciaFirmada_' .$doc);
          $contadorLicencia = 2;
    }
    else{
    	$docPDFLicencia = $datoPDFSin[0]['PDF_LIC_CED'];
          $contadorLicencia = $datoPDFSin[0]['CONTADOR_LIC'];
    }
          /////
      $pdfDescuento = $_FILES['pdfDescuento']['name'];
    $pdfDescuentoExt = pathinfo($pdfDescuento, PATHINFO_EXTENSION);
    if($pdfDescuentoExt != ''){
    	$docPDFDescuento = 'descuentoFirmada_' . $doc;
		move_uploaded_file($_FILES['pdfDescuento']['tmp_name'],'repositorio/flota/siniestros/descuento/descuentoFirmada_' .$doc);
          $contadorDescuento = 2;
    }
    else{
    	$docPDFDescuento = $datoPDFSin[0]['PDF_DESCUENTO'];
          $contadorDescuento = $datoPDFSin[0]['CONTADOR_DESC'];
    }


		$row = actualizaPDFSiniestros($idSiniestro, $docPDFSiniestro, $docPDFDeclaracion, $docPDFDeclaAseg, $docPDFLicencia, $docPDFDescuento, $contadorSiniestro, $contadorDeclaracion, $contadorDeclaAseg, $contadorLicencia, $contadorDescuento);

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
