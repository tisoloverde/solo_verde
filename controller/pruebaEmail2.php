<?php
	ini_set('display_errors', 'On');
	header('Access-Control-Allow-Origin: *');

	require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

	date_default_timezone_set('America/Santiago');

	if(count($_POST) >= 0){
				$mail = new PHPMailer(); // defaults to using php "mail()"

      //Codificacion
				$mail->CharSet = 'UTF-8';

	      //indico a la clase que use SMTP
	      $mail->SMTPSecure = 'tls';
	      $mail->Host = "smtp.office365.com"; // GMail
	      $mail->Port = 587;
	      $mail->IsSMTP(); // use SMTP
	      //$mail->SMTPAuth = true;
				$mail->IsHTML(true);
	      //indico un usuario / clave de un usuario
	      $mail->Username = "rodrigo.riverosr@equans.com";
	      $mail->Password = "Equans.2022escl";
				$mail->SMTPDebug  = 2;

        // $mail->AddEmbeddedImage('../view/img/logo-e-w_n_mail.png', 'firmaPng', 'firmaPng.png');

        $body = "Prueba email";

        $mail->SetFrom('rodrigo.riverosr@equans.com', "Prueba");

		    //defino la dirección de email de "reply", a la que responder los mensajes
		    //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
		    $mail->AddReplyTo('rodrigo.riverosr@equans.com', "Prueba");
		    //Defino la dirección de correo a la que se envía el mensaje

        //Agregamos destinatarios
		    // for($i = 0; $i < count($listaMails); $i++){
        $mail->AddAddress('rriveros.rojas29@gmail.com','rriveros.rojas29@gmail.com');
		    // }

        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		    $fecha = strtotime('+0 day');
    		$fecha = $dias[date('w', $fecha)]." ".date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " ".date('Y', $fecha) . " a las " . date('h:i:s A', $fecha);

        $mail->Subject = "Pruebade email " . $fecha . "";

		    //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
		    $mail->AltBody = "Pruebade email " . $fecha . "";

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
		}
		else{
    		echo "Sin datos";
  	}
?>
