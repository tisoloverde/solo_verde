<?php
	require('../model/consultas.php');
    session_start();

	if(count($_POST) > 0){

		$idEntrega = $_POST['idEntrega'];
		$doc = md5(rand()).'.pdf';
		$docPDFEntrega = '';
		$docPDFGuiaEntrega = '';
    $contadorPdfEntrega = '';


		$datoPDFEnt = consultaDatosPdfEntrega($idEntrega);

		$pdfEntrega = $_FILES['pdfEntrega']['name'];
    $pdfEntregaExt = pathinfo($pdfEntrega, PATHINFO_EXTENSION);
    if($pdfEntregaExt != ''){
    	$docPDFEntrega = 'entregaMatFirmada_' . $doc;
			move_uploaded_file($_FILES['pdfEntrega']['tmp_name'],'repositorio/materiales/entregaMatFirmada_' .$doc);
      $contadorPdfEntrega = 2;
    }
    else{
    	$docPDFEntrega = $datoPDFEnt[0]['PDF_ENTREGA'];
      $contadorPdfEntrega = $datoPDFEnt[0]['CONTADOR_PDF_ENTREGA'];
    }


    $pdfGuiaEntrega = $_FILES['pdfGuiaEntrega']['name'];
    $pdfGuiaEntregaExt = pathinfo($pdfGuiaEntrega, PATHINFO_EXTENSION);
    if($pdfGuiaEntregaExt != ''){
      $docPDFGuiaEntrega = 'guiaDespMatFirmada_' . $doc;
		  move_uploaded_file($_FILES['pdfGuiaEntrega']['tmp_name'],'repositorio/materiales/guiaDespMatFirmada_' .$doc);
    }
    else{
    	$docPDFGuiaEntrega = $datoPDFEnt[0]['PDF_GUIA_DESPACHO'];
    }


		$row = actualizaPDFEntregaMaterial($idEntrega,$docPDFEntrega,$docPDFGuiaEntrega,$contadorPdfEntrega);

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
