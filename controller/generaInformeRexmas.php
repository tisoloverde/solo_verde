<?php
  // ini_set('display_errors', 'On');
  date_default_timezone_set("America/Santiago");
  $ruta = str_replace("controller", "", getcwd()) . '/';

  require($ruta . 'model/consultas.php');

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $hora = date("Y-m-d H:i:s");
  $rut = $_SERVER['argv'][1];
  $email = $_SERVER['argv'][2];
  $nombreDoc = 'Carga_Rexmas_' . $rut . '_' . $hora . ".csv";
  $nombreDoc2 = 'Carga_Rexmas_UTF8_' . $rut . '_' . $hora . ".csv";
  $ceco = $_SERVER['argv'][3];
  $fechaIni = $_SERVER['argv'][4];
  $fechaFin = $_SERVER['argv'][5];
  $delimiter = ",";

  $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $rut . '_' . $hora . "_log.txt", 'a') or die("Error creando archivo");
  fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Inicio proceso =============") or die("Error escribiendo en el archivo");
  fclose($logFile);

  $row = cosultaInformeRexmas($ceco,$fechaIni,$fechaFin);

  $report = fopen($ruta . "controller/repositorio/temp/" . $nombreDoc, 'a');

  $lineData = array('empleado_id',	'contratos',	'tipo',	'fecha_inicio',	'fecha_termino',	'dias',	'descripcion',	'tipo_medio_dia',	'envia_email_supervisor',	'numero_licencia',	'dias_a_pagar',	'no_rebaja',	'fecha_concepcion',	'fecha_aplicacion',	'goce_sueldo',	'subtipo_ausencia',	'medico_tratante',	'especialidad');
  fputcsv($report, $lineData, $delimiter);

  for($i = 0; $i < count($row); $i++){
    $lineData = array($row[$i][2],$row[$i][3],$row[$i][4],$row[$i][5],$row[$i][6],$row[$i][7],$row[$i][8],$row[$i][9],$row[$i][10],$row[$i][11],$row[$i][12],$row[$i][13],$row[$i][14],$row[$i][15],$row[$i][16],$row[$i][17],$row[$i][18],$row[$i][19]);
    fputcsv($report, $lineData, $delimiter);
  }

  fseek($report, 0);

  $data = file_get_contents($ruta . "controller/repositorio/temp/" . $nombreDoc);
  $data = mb_convert_encoding($data, 'UTF-8', 'auto');
  file_put_contents($ruta . "controller/repositorio/temp/" . $nombreDoc2, $data);

  fclose($report);
  unlink($ruta . "controller/repositorio/temp/" . $nombreDoc);

  $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $rut . '_' . $hora . "_log.txt", 'a') or die("Error creando archivo");
  fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Archivo generado =============") or die("Error escribiendo en el archivo");
  fclose($logFile);

  // Emvio de email
  $mail = new PHPMailer(); // defaults to using php "mail()"

  //Codificacion
  $mail->CharSet = 'UTF-8';

  //indico a la clase que use SMTP
  $mail->SMTPSecure = 'tls';
  $mail->Host = "smtp.gmail.com"; // GMail
  $mail->Port = 587;
  $mail->IsSMTP(); // use SMTP
  $mail->SMTPAuth = true;
  //indico un usuario / clave de un usuario
  $mail->Username = "contacto@cryptodata.cl";
  $mail->Password = "biymiefrzcxdgock";

  $firma = "--
            <br />
            <img src='cid:firmaPng' alt='CIMAURBANO' style='width: 180px;'>
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

    $mail->AddEmbeddedImage($ruta . 'view/img/logo_home.png', 'firmaPng', 'firmaPng.png');
    $mail->AddAttachment($ruta . "controller/repositorio/temp/" . $nombreDoc2, $nombreDoc2);

    $body = "<p><em><span style='color:rgb(165, 165, 165)'><u>Solo Verde - Favor no responder este e-mail</u></span></em></p><br>
            <div style='width: 100%; text-align: justify; margin: 0 auto;'>
    <font style='font-size: 14px;'>
    Estimado,
    <br />
    <br />
    Adjuntamos informe de carga rexmas según solicitud en portal Solo Verde.<br />
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

    $mail->SetFrom('contacto@cryptodata.cl', "Alertas");

    //defino la dirección de email de "reply", a la que responder los mensajes
    //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
    $mail->AddReplyTo('contacto@cryptodata.cl', "Alertas");
    //Defino la dirección de correo a la que se envía el mensaje

    $mail->AddAddress($email, $email);

    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $fecha = strtotime('+0 day');
    $fecha = $dias[date('w', $fecha)]." ".date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " ".date('Y', $fecha) . " a las " . date('h:i:s A', $fecha);

    $mail->Subject = "Carga archivo rexmas " . $fecha . "";

    //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
    $mail->AltBody = "Carga archivo rexmas " . $fecha . "";

    //inserto el texto del mensaje en formato HTML
    $mail->MsgHTML($body);

    //envío el mensaje, comprobando si se envió correctamente
    if($mail->Send()) {
      echo "Ok";
      $logFile = fopen($ruta . "/controller/repositorio/temp/Carga_Rexmas_" . $rut . '_' . $hora . "_log.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("Y-m-d H:i:s")." ============= Email enviado =============") or die("Error escribiendo en el archivo");
      fclose($logFile);
    }
    else{
      echo $mail->ErrorInfo;
      //echo "Sin datos";
    }
?>
