<?php
	// //ini_set('display_errors', 'On');
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	// require("phpmailer/PHPMailerAutoload.php");
	require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

	date_default_timezone_set('America/Santiago');

	if(count($_POST) > 0){
		$rut = $_POST['rutUsuario'];
		$email = $_POST['mailUsuario'];
		$nombre = $_POST['nombreUsuario'];

    	$row = resetQR($rut);

    	if($row == "Ok")
    	{

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

	        // $mail->AddEmbeddedImage('../view/img/equans-logo-slogan_email.png', 'firmaPng', 'firmaPng.png');
					$mail->AddEmbeddedImage('../view/img/logo_home.png', 'firmaPng', 'firmaPng.png');

					$rowUrl = datosHost($_SERVER['SERVER_NAME']);

					$body = "<p><em><span style='color:rgb(165, 165, 165)'><u>Solo Verde - Favor no responder este e-mail</u></span></em></p><br>
									<div style='width: 100%; text-align: justify; margin: 0 auto;'>
			    <font style='font-size: 14px;'>
			    Estimado " . $nombre . ",
					<br />
			    <br />
			    Su clave 2FA ha sido restablecida en el Sistema de Gestión CIMAURBANO.<br /><br />
	        Cuando ingrese nuevamente al sistema deberá escanear el código QR generado con la aplicación móvil.<br /><br />
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

			    $listaMails = array($email);

	        //Agregamos destinatarios
			    for($i = 0; $i < count($listaMails); $i++){
			        $mail->AddAddress($listaMails[$i], $listaMails[$i]);
			    }

	        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	    		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

			    $fecha = strtotime('+0 day');
	    		$fecha = $dias[date('w', $fecha)]." ".date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " ".date('Y', $fecha) . " a las " . date('h:i:s A', $fecha);

	        $mail->Subject = "Restablecimiento de clave 2FA " . $fecha . "";

			    //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
			    $mail->AltBody = "Restablecimiento de clave 2FA " . $fecha . "";

			    //inserto el texto del mensaje en formato HTML
			    $mail->MsgHTML($body);

	        //envío el mensaje, comprobando si se envió correctamente
			    if($mail->Send()) {
			        echo "Ok";
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
