<?php
	require('../model/consultas.php');
    session_start();

	if(count($_POST) > 0){

		$idAsig = $_POST['idAsig'];
		$doc = md5(rand()).'.pdf';
		$docPDFChecklist = '';
		$docPDFLicencia = '';
		$docPDFAsignacion = '';
        $contadorChecklist = '';
        $contadorLicencia = '';
        $contadorAsignacion = '';

		$datoPDFvh = consultaDatosPdfAsignacionVehiculo($idAsig);

		$pdfChecklist = $_FILES['pdfChecklist']['name'];
	    $pdfChecklistExt = pathinfo($pdfChecklist, PATHINFO_EXTENSION);
	    if($pdfChecklistExt != ''){
	    	$docPDFChecklist = 'checklistFirmada_' . $doc;
			move_uploaded_file($_FILES['pdfChecklist']['tmp_name'],'repositorio/flota/asignaciones/checklist/checklistFirmada_' .$doc);
            $contadorChecklist = 2;
	    }
	    else{
	    	$docPDFChecklist = $datoPDFvh[0]['CHECKLIST'];
            $contadorChecklist = $datoPDFvh[0]['CONTADORCHECKILIST'];
	    }


	    $pdfLicencia = $_FILES['pdfLicencia']['name'];
	    $pdfLicenciaExt = pathinfo($pdfLicencia, PATHINFO_EXTENSION);
	    if($pdfLicenciaExt != ''){
	    	$docPDFLicencia = 'licencia_' . $doc;
	    	move_uploaded_file($_FILES['pdfLicencia']['tmp_name'],'repositorio/flota/asignaciones/licencia/licencia_' . $doc);
            $contadorLicencia = 2;
	    }
	    else{
	    	$docPDFLicencia = $datoPDFvh[0]['LIC'];
            $contadorLicencia = $datoPDFvh[0]['CONTADORLIC'];
	    }


	    $pdfAsignacion = $_FILES['pdfAsig']['name'];
	    $pdfAsignacionExt = pathinfo($pdfAsignacion, PATHINFO_EXTENSION);
	    if($pdfAsignacionExt != ''){
	    	$docPDFAsignacion = 'asignacionFirmada_' . $doc;
	    	move_uploaded_file($_FILES['pdfAsig']['tmp_name'],'repositorio/flota/asignaciones/asignacion/asignacionFirmada_' . $doc);
            $contadorAsignacion = 2;
	    }
	    else{
	    	$docPDFAsignacion = $datoPDFvh[0]['ASIG'];
            $contadorAsignacion = $datoPDFvh[0]['CONTADORASIG'];
	    }


		$row = actualizaPDFAsignacionVehiculo($idAsig, $docPDFChecklist, $docPDFLicencia, $docPDFAsignacion, $contadorChecklist, $contadorLicencia, $contadorAsignacion);

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