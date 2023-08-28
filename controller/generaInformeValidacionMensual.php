<?php
  // ini_set('display_errors', 'On');
  // ok
  date_default_timezone_set("America/Santiago");
  $ruta = str_replace("controller", "", getcwd()) . '/';

  $_SERVER['DB_HOST'] = 'GfD5FyT5IaW/yfUvHs0leg==';
  $_SERVER['DB_USER'] = 'DF918ru9PmuGsp1Num4j9Q==';
  $_SERVER['DB_PASS'] = 'JSciPp8ebWHm/6RcO4gfioauF+no7qcox395gz/gK7c=';
  $_SERVER['DB_CLAVE_EC'] = 'As233@sZ&eibhQZ#mIkV';

  require($ruta . 'model/consultas.php');

  require 'phpSpreadsheet/vendor/autoload.php';
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  session_start();
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  $hora = date("Y-m-d H:i:s");
  $rut = $_SERVER['argv'][1];
  $email = $_SERVER['argv'][2];
  $ceco = $_SERVER['argv'][3];
  $anoMes = $_SERVER['argv'][4];
  $nombreDoc =  'Informe_Validacion_Mensual_' . $anoMes . "_" . $rut . '_' . $hora . ".xlsx";
  $nombreDoc2 = 'Informe_Validacion_Mensual_UTF8_' . $anoMes . "_" . $rut . '_' . $hora . ".xlsx";
  $delimiter = ";";

  $logFile = fopen($ruta . "/controller/repositorio/temp/Informe_Validacion_Mensual_" . $anoMes . "_" . $rut . '_' . $hora . "_log.txt", 'a') or die("Error creando archivo");
  fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Inicio proceso =============") or die("Error escribiendo en el archivo");
  fclose($logFile);
  
  $row = datosDashboardCubo($ceco,$anoMes);

  $detalle = array();
  $detalle[] = array('IDPERSONAL','RUT','NOMBRES','CLASIFICACION','SIGLA_CLASIFICACION','FECHA_INGRESO','FECHA_TERMINO','CECO','NOMENCLATURA','FECHA_MARCA','MES','ANO','SIGLA','DESCRIPCION_SIGLA','CONCEPTO','PAGADO_NOPAGADO','ESTADO');

  for($i = 0; $i < count($row); $i++){
      $detalle[] = array($row[$i]['IDPERSONAL'],	$row[$i]['DNI'],	$row[$i]['NOMBRES'],	$row[$i]['CLASIFICACION'],	$row[$i]['SIGLA CLASIFICACION'],	$row[$i]['FECHA_INGRESO'], $row[$i]['FECHA_TERMINO'],	$row[$i]['CECO'], $row[$i]['NOMENCLATURA'], $row[$i]['FECHA_MARCA'], $row[$i]['MES'], $row[$i]['AÑO'], $row[$i]['SIGLA'], $row[$i]['DESCRIPCION SIGLA'], $row[$i]['CONCEPTO'], $row[$i]['PAGADO_NOPAGADO'], $row[$i]['ESTADO']);      
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
  $excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
  $excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
  $excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
  $excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
  $excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
  $excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
  $excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);

  $writer = new Xlsx($excel);

  $ruta = str_replace("generaPDF", "", getcwd());

  $name = $ruta . "/repositorio/temp/" . $nombreDoc;

  $writer->save($name);

  $logFile = fopen($ruta . "/repositorio/temp/Informe_Validacion_Mensual_" . $anoMes . "_" . $rut . '_' . $hora . "_log.txt", 'a') or die("Error creando archivo");
  fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Archivo generado =============") or die("Error escribiendo en el archivo");
  fclose($logFile);

  // Emvio de email
  $mail = new PHPMailer(); // defaults to using php "mail()"

  //Codificacion
  $mail->CharSet = 'UTF-8';

  //indico a la clase que use SMTP
  $mail->SMTPSecure = 'tls';
  $mail->Host = "mail.cimaurbano.cl"; // GMail
  $mail->Port = 587;
  $mail->IsSMTP(); // use SMTP
  $mail->SMTPAuth = true;
  //indico un usuario / clave de un usuario
  $mail->Username = "notificaciones@cimaurbano.cl";
  $mail->Password = "avJ8s8sCoG";

  $firma = "--
            <br />
            <img src='cid:firmaPng' alt='CIMAURBANO' style='width: 180px;' width='180px'>
            <br />
            Aportando calidad de vida en espacios urbanos
            <br />
            ..........................................................................................................................................................................
            <br>
            <br>
            AVISO LEGAL.
            <br>
            <font style='margin-top: 0; line-height: 15px;font-family: Arial;font-size:7.5pt; text-align: justify; width: 100%'>
            Este mensaje y sus documentos anexos pueden contener información confidencial o legalmente protegida. Está dirigido única y exclusivamente a la persona o entidad reseñada como destinatarios del mensaje. Si este mensaje le hubiera llegado por error, por favor elimínelo sin revisarlo ni reenviarlo y notifíquelo lo antes posible al remitente. Cualquier divulgación, copia o utilización de dicha información es contraria a la ley. Le agradecemos su colaboración.
            </font>
            <br>";

    $mail->AddEmbeddedImage('/var/www/html/aplicaciones/view/img/logo_home.png', 'firmaPng', 'firmaPng.png');
    $mail->AddAttachment($ruta . "/repositorio/temp/" . $nombreDoc, $nombreDoc);

    $body = "<p><em><span style='color:rgb(165, 165, 165)'><u>Solo Verde - Favor no responder este e-mail</u></span></em></p><br>
            <div style='width: 100%; text-align: justify; margin: 0 auto;'>
    <font style='font-size: 14px;'>
    Estimado,
    <br />
    <br />
    Adjuntamos Informe_Validacion_Mensual según solicitud en portal Solo Verde.<br />
    <br />
    </font>
    <div'>
        <font style='font-size: 14px;'>
            Saludos cordiales.
        </font>
        <br />
        <br />
        " . $firma . "
    </div>
    ";

    $mail->SetFrom('notificaciones@cimaurbano.cl', "Notificaciones");

    //defino la dirección de email de "reply", a la que responder los mensajes
    //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
    $mail->AddReplyTo('notificaciones@cimaurbano.cl', "Notificaciones");
    //Defino la dirección de correo a la que se envía el mensaje

    $mail->AddAddress($email, $email);

    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $fecha = strtotime('+0 day');
    $fecha = $dias[date('w', $fecha)]." ".date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " ".date('Y', $fecha) . " a las " . date('h:i:s A', $fecha);

    $mail->Subject = "Informe_Validacion_Mensual " . $fecha . "";

    //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
    $mail->AltBody = "Informe_Validacion_Mensual " . $fecha . "";

    //inserto el texto del mensaje en formato HTML
    $mail->MsgHTML($body);

    //envío el mensaje, comprobando si se envió correctamente
    if($mail->Send()) {
      echo "Ok";
      $logFile = fopen($ruta . "/repositorio/temp/Informe_Validacion_Mensual_" . $anoMes . "_" . $rut . '_' . $hora . "_log.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Email enviado =============") or die("Error escribiendo en el archivo");
      fclose($logFile);
    }
    else{
      echo $mail->ErrorInfo;
      //echo "Sin datos";
    }
?>
