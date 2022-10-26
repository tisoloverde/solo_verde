<?php
    ini_set('display_errors', 'Off');
    require('phpSpreadsheet/vendor/autoload.php');
    require('../model/consultas.php');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $mes = $_POST['mes'];
		$ano = $_POST['ano'];
		$strDni = $_POST['strDni'];

    $row = datosDetallePracticaTodos($mes, $ano, $strDni);
		// var_dump($row);

    $detalle = array();
    $detalle[] = array('RUT',	'NOMBRE',	'AUDITORIA',	'CICLO',	'META_MENSUAL',	'TOTAL_REALIZADAS',	'Realizadas_Sem_1',	'Meta_Sem_1',	'Realizadas_Sem_2',	'Meta_Sem_2',	'Realizadas_Sem_3',	'Meta_Sem_3',	'Realizadas_Sem_4',	'Meta_Sem_4',	'Realizadas_Sem_5',	'Meta_Sem_5',	'Realizadas_Sem_6',	'Meta_Sem_6');

    for($i = 0; $i < count($row); $i++){
        $detalle[] = array($row[$i]['RUT'],	$row[$i]['NOMBRE'],	$row[$i]['AUDITORIA'],	$row[$i]['CICLO'],	$row[$i]['META_MENSUAL'],	$row[$i]['TOTAL_REALIZADAS'],	$row[$i]['Realizadas_Sem_1'],	$row[$i]['Meta_Sem_1'],	$row[$i]['Realizadas_Sem_2'],	$row[$i]['Meta_Sem_2'],	$row[$i]['Realizadas_Sem_3'],	$row[$i]['Meta_Sem_3'],	$row[$i]['Realizadas_Sem_4'],	$row[$i]['Meta_Sem_4'],	$row[$i]['Realizadas_Sem_5'],	$row[$i]['Meta_Sem_5'],	$row[$i]['Realizadas_Sem_6'],	$row[$i]['Meta_Sem_6']);
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

    $writer = new Xlsx($excel);

		$ruta = str_replace("generaPDF", "", getcwd());

		$row = consultaPracticaGuardada($id);
		$row = $row[0];

		$document = $ruta . '/repositorio/temp'; //Linux
		$random = md5(rand());

		$name = $document . '/detalle_practicas_' . $random . '.xlsx';

		$writer->save($name);

		echo 'detalle_practicas_' . $random . '.xlsx';
?>
