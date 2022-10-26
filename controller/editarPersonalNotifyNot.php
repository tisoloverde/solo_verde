<?php
  ////ini_set('display_errors', 'On');
  require('../model/consultas.php');
  require('templates/sendMailTransferBossNot.php');

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $mail = new PHPMailer();

  session_start();

  if (count($_POST) > 0) {
    $row = '';

    $nombreNuevoJefe = $_POST['nombreNuevoJefe'];
    $emailNuevoJefe = $_POST['emailNuevoJefe'];
    $strlstPersonal = $_POST['strlstPersonal'];
    $lstExJefes = $_POST['lstExJefes'];

    if ($row != "error" ) {
      // sendToOneNewBoss($mail, $nombreNuevoJefe, $emailNuevoJefe, $strlstPersonal['nombres']);
      // $row = ingresaUsuarioNotificacionPorMail($emailNuevoJefe, 'Personal', "Le informamos que se le ha rechazado la transferencia de nuevo personal: <br />" . $strlstPersonal['nombres'], "Personal fue rechazado para ser transferido a su jefatura<br>" . $strlstPersonal['nombres'], "Personal transferido rechazado", "#/notificaciones");
      for ($i=0; $i < count($lstExJefes); $i++) {
        $boss = $lstExJefes[$i];
        $personal = '';
        sendToOneOldBoss($mail, $boss, $personal, $nombreNuevoJefe);
        $row2 = ingresaUsuarioNotificacionPorMail($boss, 'Personal', "Le informamos que la transferencia del siguiente personal ha sido rechazado a la jefatura de " . $nombreNuevoJefe . ": <br />" .
        $personal, "Personal fue rechazado para ser transferido de su jefatura<br>" .  $personal, "Personal transferido rechazado", "#/notificaciones");
      }
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>
