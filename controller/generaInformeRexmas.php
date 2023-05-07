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
  $ceco = 213;
  $fechaIni = '2023-04-01';
  $fechaFin = '2023-04-30';
  $delimiter = ",";

  // $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $hora . "_log.txt", 'a') or die("Error creando archivo");
  // fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Inicio proceso =============") or die("Error escribiendo en el archivo");
  // fclose($logFile);

  $row = cosultaInformeRexmas($ceco,$fechaIni,$fechaFin);

  $report = fopen($ruta . "controller/repositorio/temp/" . $nombreDoc, 'a');

  for($i = 0; $i < count($row); $i++){
    $lineData = array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18],$row[19]);
    fputcsv($report, $lineData, $delimiter);
  }

  fseek($f, 0);
  fclose($report);

  // $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $hora . "_log.txt", 'a') or die("Error creando archivo");
  // fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Término proceso =============") or die("Error escribiendo en el archivo");
  // fclose($logFile);
?>
