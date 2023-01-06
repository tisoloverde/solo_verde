<?php
    ini_set('display_errors', 'Off');
    require('phpSpreadsheet/vendor/autoload.php');
    require('../model/consultas.php');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $row = listadoPersonalYJefaturas();
		// var_dump($row);

    $detalle = array();
    $detalle[] = array('IDPERSONAL',	'DNI',	'EMPRESA',	'NOMBRES',	'APELLIDOS',	'CARGO',	'EMAIL',	'TELEFONO',	'RUTJEFEDIRECTO',	'JEFE',	'CONTACTO',	'GERENCIA',	'SUBGERENCIA',	'CLIENTE',	'COMUNA',	'REGION',	'PATENTE',	'EXTERNO',	'SUCURSAL',	'CLASIFICACION',	'NIVEL',	'CENTRO_COSTO');

    for($i = 0; $i < count($row); $i++){
        $detalle[] = array($row[$i]['IDPERSONAL'],	$row[$i]['DNI'],	$row[$i]['EMPRESA'],	$row[$i]['NOMBRES'],	$row[$i]['APELLIDOS'],	$row[$i]['CARGO'],	$row[$i]['EMAIL'],	str_replace('<br>', '/',$row[$i]['TELEFONO']),	$row[$i]['RUTJEFEDIRECTO'],	$row[$i]['JEFE'],	$row[$i]['CONTACTO'],	$row[$i]['GERENCIA'],	$row[$i]['SUBGERENCIA'],	$row[$i]['CLIENTE'],	$row[$i]['COMUNA'],	$row[$i]['REGION'],	$row[$i]['PATENTE'],	$row[$i]['EXTERNO'],	$row[$i]['SUCURSAL'],	$row[$i]['CLASIFICACION'],	$row[$i]['NIVEL'],	$row[$i]['NOMENCLATURA']);
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
    $excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);

    $writer = new Xlsx($excel);

		$ruta = str_replace("generaPDF", "", getcwd());

		$document = $ruta . '/repositorio/temp'; //Linux
		$random = md5(rand());

		$name = $document . '/gestion_operativa_' . $random . '.xlsx';

		$writer->save($name);

		echo 'gestion_operativa_' . $random . '.xlsx';
?>
