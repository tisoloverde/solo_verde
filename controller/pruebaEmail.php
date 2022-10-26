<?php
	ini_set('display_errors', 'On');
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	// require("phpmailer/PHPMailerAutoload.php");
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
	      // $mail->SMTPSecure = 'tls';
				$mail->SMTPSecure = 'tls';
	      $mail->Host = "smtp.gmail.com"; // GMail
	      $mail->Port = 587;
	      $mail->IsSMTP(); // use SMTP
	      $mail->SMTPAuth = true;
	      //indico un usuario / clave de un usuario
	      $mail->Username = "contacto@cryptodata.cl";
	      $mail->Password = "biymiefrzcxdgock";

        $mail->AddEmbeddedImage('../view/img/logo_home.png', 'firmaPng', 'firmaPng.png');

        $body = '<p><em><span style="color:rgb(165, 165, 165)"><u>Creación de contraseña - Favor no responder este e-mail</u></span></em></p><br>Prueba email';

        $mail->SetFrom('contacto@cryptodata.cl', "Alertas");

		    //defino la dirección de email de "reply", a la que responder los mensajes
		    //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
		    $mail->AddReplyTo('contacto@cryptodata.cl', "Alertas");
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
