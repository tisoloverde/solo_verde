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
        $row = '';

        $rutPersonal = $_POST['rutPersonal'];
        $telefonoPersonal = $_POST['telefonoPersonal'];
        $idPatente = $_POST['idPatente'];
        $kilometrajePatente = $_POST['kilometrajePatente'];
        $idBodegaPatente = $_POST['idBodegaPatente'];
        $observacion = $_POST['observacion'];
        $consultaPatente = codigoPatente($idPatente);
        $patente = $consultaPatente[0]['CODIGO'];
        $consultaJefeDirecto = consultaJefeDirecto($rutPersonal);
        $nombreJefe = $consultaJefeDirecto[0]['JEFE'];
        $emailJefe = $consultaJefeDirecto[0]['EMAIL'];
        $rutJefe = $consultaJefeDirecto[0]['RUT'];

        $row = asignacionVehiculo( $rutPersonal, $telefonoPersonal, $idPatente, $kilometrajePatente, $idBodegaPatente, $observacion, $_SESSION['rutUser']);
        $actualizaDesasignacion = actualizaEstadoDesasignacionParaAsignacion($rutPersonal);

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
        $mensaje = "Se genero una nueva asignación";
        $frealizada = "";
    		$fcaducidad = "";
    		$frealizadaCir = "";
    		$fcaducidadCir = "";
        $docPDFRev1 = "";
        $docPDFCir1 = "";
        $docPDFAsegur1 = "";
        $docPDFOtrosVh1 = "";

        if($row != "Error" )
        {
          ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
          $rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
          $tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
          $docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
          ingresarNotificacionAsignacionVeh($rutJefe, 'Asignación', "Le informamos que la siguiente patente " . $patente . "<br /> ha sido asignada a " . $personalAsig . "",
          "#/notificaciones", "Patente asignada<br>" .  $patente, "Patente asignada");

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
            Bases de inmuebles
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


	      $body = "<p><em><span style='color:rgb(165, 165, 165)'><u>Bases de inmuebles - Favor no responder este e-mail</u></span></em></p><br>
                <div style='width: 100%; text-align: justify; margin: 0 auto;'>
			    <font style='font-size: 14px;'>
			    Estimado " . $nombreJefe . ",
			    <br />
			    <br />
			    Le informamos que la siguiente patente " . $patente . " ha sido asignada a " . $personalAsig . "<br /><br />
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

	        $mail->Subject = "Asignación de Vehículo " . $fecha . "";

			    //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
            $mail->AltBody = "Asignación de Vehículo " . $fecha . "";

            //inserto el texto del mensaje en formato HTML
            $mail->MsgHTML($body);

	        //envío el mensaje, comprobando si se envió correctamente
            if($mail->Send()) {
                echo json_encode($row);
            }
            else{
                echo $mail->ErrorInfo;
                    //echo "Sin datos";
                }
                //echo "Ok";
        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
