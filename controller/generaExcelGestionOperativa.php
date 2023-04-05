<?php
    ini_set('display_errors', 'On');
    require('phpSpreadsheet/vendor/autoload.php');
    require('../model/consultas.php');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $search = $_POST['search'];

    $row = listadoPersonalYJefaturasExcel($search);

    $detalle = array();
    $detalle[] = array('IDPERSONAL',	'RUT',	'EMPRESA',	'NOMBRES',	'APELLIDOS',	'CARGO',	'EMAIL',	'FECHA_INGRESO',	'AFP',	'SALUD',	'TELEFONO',	'COMUNA',	'REGION',	'SUCURSAL',	'CODIGO_CECO','CECO');

    for($i = 0; $i < count($row); $i++){
        $detalle[] = array($row[$i]['IDPERSONAL'],	$row[$i]['DNI'],	$row[$i]['EMPRESA'],	$row[$i]['NOMBRES'],	$row[$i]['APELLIDOS'],	$row[$i]['CARGO'],	$row[$i]['EMAIL'], $row[$i]['FECHA_INGRESO'],	$row[$i]['AFP'], $row[$i]['SALUD'], str_replace('<br>', '/',$row[$i]['TELEFONO']),	$row[$i]['COMUNA'],	$row[$i]['REGION'],	$row[$i]['SUCURSAL'],	$row[$i]['CODIGO_CECO'],	$row[$i]['CECO']);
    }

    //Generamos archivo excel
    $excel = new Spreadsheet();

    // Fill worksheet from values in array
    $excel->getActiveSheet()->fromArray($detalle, null, 'A1');

    // Rename worksheet
    $excel->getActiveSheet()->setTitle("Detalle");

    // Set AutoSize for name and email fields
    $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

    $writer = new Xlsx($excel);

		$ruta = str_replace("generaPDF", "", getcwd());

		$document = $ruta . '/repositorio/temp'; //Linux
		$random = md5(rand());

		$name = $document . '/gestion_operativa_' . $random . '.xlsx';

		$writer->save($name);

		echo 'gestion_operativa_' . $random . '.xlsx';
?>
