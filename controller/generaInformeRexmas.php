<?php
  // ini_set('display_errors', 'On');
  $ruta = str_replace("controller", "", getcwd()) . '/';

  require($ruta . 'model/consultas.php');

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $hora = date("Y-m-d H:i:s");
  $rut = '17092695-1';
  $nombreDoc = 'Carga_Rexmas_' . $hora . ".csv";
  $nombreDoc2 = 'Carga_Rexmas_UT8' . $hora . ".csv";
  $ceco = 213;
  $fechaIni = '2023-04-01';
  $fechaFin = '2023-04-30';
  $delimiter = ",";

  // $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $hora . "_log.txt", 'a') or die("Error creando archivo");
  // fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Inicio proceso =============") or die("Error escribiendo en el archivo");
  // fclose($logFile);

  $row = cosultaInformeRexmas($ceco,$fechaIni,$fechaFin);

  $report = fopen($ruta . "controller/repositorio/temp/" . $nombreDoc, 'a');

  $lineData = array('empleado_id',	'contratos',	'tipo',	'fecha_inicio',	'fecha_termino',	'dias',	'descripcion',	'tipo_medio_dia',	'envia_email_supervisor',	'numero_licencia',	'dias_a_pagar',	'no_rebaja',	'fecha_concepcion',	'fecha_aplicacion',	'goce_sueldo',	'subtipo_ausencia',	'medico_tratante',	'especialidad');
  fputcsv($report, $lineData, $delimiter);

  for($i = 0; $i < count($row); $i++){
    $lineData = array($row[$i][2],$row[$i][3],$row[$i][4],$row[$i][5],$row[$i][6],$row[$i][7],$row[$i][8],$row[$i][9],$row[$i][10],$row[$i][11],$row[$i][12],$row[$i][13],$row[$i][14],$row[$i][15],$row[$i][16],$row[$i][17],$row[$i][18],$row[$i][19]);
    fputcsv($report, $lineData, $delimiter);
  }

  fseek($report, 0);

  stream_filter_append($report, 'convert.iconv.UTF-8/OLD-ENCODING');
  stream_copy_to_stream($report, fopen($nombreDoc2, 'w'));

  fclose($report);

  // $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $hora . "_log.txt", 'a') or die("Error creando archivo");
  // fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Término proceso =============") or die("Error escribiendo en el archivo");
  // fclose($logFile);
?>
