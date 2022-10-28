<?php
    header('Access-Control-Allow-Origin: *');
    require('../model/consultas.php');
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

	date_default_timezone_set('America/Santiago');
    session_start();

    if(count($_POST) > 0){

        $nombreJefe = $_POST['nombrePersonal'];
        $emailJefe = $_POST['correoPersonal'];
        $rutJefe = $_POST['rutPersonal'];
        $patente = $_POST['patenteMantencion'];
        $pdf = $_POST['pdf'];
        $taller = $_POST['taller'];
        $direccionTaller = $_POST['direccionTaller'];

        $v = consultaPatenteEspecifica($patente);
    		$estadoVeh = $v[0]['IDPATENTE_ESTADO'];
    		$tipoVeh = $v[0]['IDPATENTE_TIPOVEHICULO'];
    		$propiedad = $v[0]['IDPATENTE_PROPIEDAD'];
    		$marcaModelo = $v[0]['IDPATENTE_MARCAMODELO'];
    		$proveedor = $v[0]['IDPATENTE_PROVEEDOR'];
    		$bodega = $v[0]['IDSUCURSAL'];
    		$estructOperac = $v[0]['IDESTRUCTURA_OPERACION'];
    		$aseguradora = $v[0]['IDPATENTE_ASEGURADORA'];
    		$subcontratista = $v[0]['IDSUBCONTRATISTAS'];
    		$kilometraje = $v[0]['KILOMETRAJE'];
    		$ano = $v[0]['AÑO'];
    		$vin = $v[0]['VIN'];
    		$color = $v[0]['IDPATENTE_COLOR'];
    		$fInicio = $v[0]['FINICIO'];
    		$fTermino = $v[0]['FTERMINO'];
    		$tipoMonto = $v[0]['TIPOMONTO'];
    		$monto = $v[0]['MONTO'];
    		$montoAseg = $v[0]['MONTO_ASEGURADORA'];
    		$fMantto = $v[0]['FMANTENIMIENTO'];
        $operacion = $v[0]['OPERACION'];
        $nMotor = $v[0]['NRO_MOTOR'];
    		$patenteOriginal = $v[0]['PATENTE_ORIGINAL'];
        $litros = $v[0]['LITROS_ESTANQUE'];

        $v1 = consultaPatenteHistorial($patente);
        $estadoControl = $v1[0]['ESTADO_CONTROL'];
    		$estadoRrhh = $v1[0]['ESTADO_PERSONAL'];
    		$personalAsig = $v1[0]['PERSONAL'];
    		$rutAsig = $v1[0]['DNI'];
        $mensaje = "Se generó una nueva Mantención, presenta vehículo: " . $nombreJefe ." / " . $rutJefe . "";
        $frealizada = "";
    		$fcaducidad = "";
    		$frealizadaCir = "";
    		$fcaducidadCir = "";
        $docPDFRev1 = "";
        $docPDFCir1 = "";
        $docPDFAsegur1 = "";
        $docPDFOtrosVh1 = "";

        ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
        $rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
        $tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
        $docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
        ingresarNotificacionAsignacionVeh($rutJefe, 'Mantención', "Le informamos que se ha agendado una nueva mantención para el vehículo con patente " . $patente . ", en el taller " . $taller . " con dirección en" . $direccionTaller . ".",
        "#/notificaciones", "Nueva Mantención<br>" .  $patente, "Nueva Mantención");

        $mail = new PHPMailer(); // defaults to using php "mail()"

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
        <img src='cid:firmaPng' alt='E-Gestiontech' style='width: 180px;'>
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

        $mail->AddEmbeddedImage('../view/img/logo_home.png', 'firmaPng', 'firmaPng.png');


        $body = "<p><em><span style='color:rgb(165, 165, 165)'><u>Solo Verde - Favor no responder este e-mail</u></span></em></p><br>
                <div style='width: 100%; text-align: justify; margin: 0 auto;'>
            <font style='font-size: 14px;'>
            Estimado " . $nombreJefe . ",
            <br />
            <br />
            Le informamos que se ha agendado una nueva mantención para el vehículo con patente " . $patente . ", en el taller " . $taller . ", con dirección en  " . $direccionTaller . ".<br /><br />
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

            $listaMails = array($emailJefe);

        //Agregamos destinatarios
        for($i = 0; $i < count($listaMails); $i++){
            $mail->AddAddress($listaMails[$i], $listaMails[$i]);
        }

        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $fecha = strtotime('+0 day');
        $fecha = $dias[date('w', $fecha)]." ".date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " ".date('Y', $fecha) . " a las " . date('h:i:s A', $fecha);

        $mail->Subject = "Nueva Mantención " . $fecha . "";

            //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
        $mail->AltBody = "Nueva Mantención " . $fecha . "";
        $mail->AddAttachment('repositorio/flota/mantenciones/agenda/' . $pdf);

        //inserto el texto del mensaje en formato HTML
        $mail->MsgHTML($body);

        //envío el mensaje, comprobando si se envió correctamente
        if($mail->Send()) {
            echo "OK";
            //echo json_encode($row);
        }
        else{
            echo $mail->ErrorInfo;
            }
            //echo "Ok";
    }
    else{
        echo "Sin datos";
    }
?>
