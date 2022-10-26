<?php

  function getFecha() {
    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $fecha = strtotime('+0 day');
    $fecha = $dias[date('w', $fecha)]." ".date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " ".date('Y', $fecha) . " a las " . date('h:i:s A', $fecha);
    return $fecha;
  }

  function getSignature() {
    $firma = "
      --
      <br />
      <img src='cid:firmaPng' alt='Ezentis' style='width: 180px;'>
      <br />
      Integración y control operacional
      <br />
      ..........................................................................................................................................................................
      <br>
      <br>
      AVISO LEGAL.
      <br>
      <font style='margin-top: 0; line-height: 15px;font-family: Arial;font-size:7.5pt; text-align: justify; width: 100%'>
        Este mensaje y sus documentos anexos pueden contener información confidencial o legalmente protegida. Está dirigido única y exclusivamente a la persona o entidad reseñada como destinatarios del mensaje. Si este mensaje le hubiera llegado por error, por favor elimínelo sin revisarlo ni reenviarlo y notifíquelo lo antes posible al remitente. Cualquier divulgación, copia o utilización de dicha información es contraria a la ley. Le agradecemos su colaboración.
      </font>
      <br>
    ";
    return $firma;
  }

  function init($mail) {
    $mail->CharSet = 'UTF-8';

    //indico a la clase que use SMTP
    $mail->Host = "10.214.70.141"; // GMail
    $mail->Port = 25;
    $mail->IsSMTP(); // use SMTP
    //$mail->SMTPAuth = true;
    //$mail->SMTPAutoTLS = false;
    // $mail->SMTPDebug=2;
    //indico un usuario / clave de un usuario
    $mail->Username = "XN8025";
    $mail->Password = "";

    $mail->AddEmbeddedImage('../view/img/equans-logo-slogan_email.png', 'firmaPng', 'firmaPng.png');
    $mail->SetFrom('XN8025@equans.com', "Alertas");
    $mail->AddReplyTo('XN8025@equans.com', "Alertas");

    $mail->Subject = "Aprobado - Solicitud de Jefatura " . getFecha() . "";
    $mail->AltBody = "Aprobado - Solicitud de Jefatura " . getFecha() . "";

    return $mail;
  }

  function sendToOneNewBoss($mail, $nombreNuevoJefe, $emailNuevoJefe, $lstNamesPersonal) {
    $mail = init($mail);
    $body = "<p><em><span style='color:rgb(165, 165, 165)'><u>Sistema integración Equans - Favor no responder este e-mail</u></span></em></p><br>
      <div style='width: 100%; text-align: justify; margin: 0 auto;'>
        <font style='font-size: 14px;'>
          Estimado " . $nombreNuevoJefe . ",
          <br />
          <br />
          Le informamos que se ha aprobado el personal solicitado: <br /><br />" .
          $lstNamesPersonal . "
          <br />
          <br />
        </font>
        <div'>
          <font style='font-size: 14px;'>
            Saludos cordiales.
          </font>
          <br />
          <br />
          " . getSignature() . "
        </div>
      </div>
    ";

    $listaMails = array($emailNuevoJefe);
    for($i = 0; $i < count($listaMails); $i++) {
      $mail->AddAddress($listaMails[$i], $listaMails[$i]);
    }

    $mail->MsgHTML($body);
    if ($mail->Send()) {
      echo "Ok";
    } else {
      echo "ERROR MAIL";
    }
  }

  function sendToOneOldBoss($mail, $emailExJefe, $lstNamesPersonal, $nombreNuevoJefe) {
    $mail = init($mail);
    $body = "
      <div style='width: 100%; text-align: justify; margin: 0 auto;'>
        <font style='font-size: 14px;'>
          Estimado(a):,
          <br />
          <br />
          Le informamos que el siguiente personal ha sido aprobado para ser solicitado a la jefatura de " . $nombreNuevoJefe . ": <br />" .
          $lstNamesPersonal . "
          <br />
          <br />
        </font>
        <div'>
          <font style='font-size: 14px;'>
            Saludos cordiales.
          </font>
          <br />
          <br />
          " . getSignature() . "
        </div>
      </div>
    ";

    $listaMails = array($emailExJefe);
    // var_dump($emailExJefe);
    for($i = 0; $i < count($listaMails); $i++) {
      $mail->AddAddress($listaMails[$i], $listaMails[$i]);
    }

    $mail->MsgHTML($body);
    if ($mail->Send()) {
      echo "Ok";
    } else {
      echo "ERROR MAIL";
    }
  }

?>
