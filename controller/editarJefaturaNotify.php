<?php
  // ini_set('display_errors', 'On');
  require('../model/consultas.php');
  require('templates/sendMailChangeBoss.php');

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

    if (array_key_exists('lstExJefes', $_POST)) {
      $lstExJefes = $_POST['lstExJefes'];
    }

    if ($row != "error" ) {
      sendToOneNewBoss($mail, $nombreNuevoJefe, $emailNuevoJefe, $strlstPersonal['nombres']);
      $row = ingresaUsuarioNotificacionPorMail($emailNuevoJefe, 'Personal', "Le informamos que se le ha asignado nuevo personal: <br />" . $strlstPersonal['nombres'], "Personal fue asignado a su jefatura<br>" . $strlstPersonal['nombres'], "Personal asignado", "#/notificaciones");
      if (array_key_exists('lstExJefes', $_POST)) {
        for ($i=0; $i < count($lstExJefes); $i++) {
          $boss = $lstExJefes[$i][0];
          $personal = $lstExJefes[$i][1];
          sendToOneOldBoss($mail, $boss, $personal, $nombreNuevoJefe);
          $row2 = ingresaUsuarioNotificacionPorMail($boss, 'Personal', "Le informamos que el siguiente personal ha sido transferido a la jefatura de " . $nombreNuevoJefe . ": <br />" .
          $personal, "Personal fue removido de su jefatura<br>" .  $personal, "Personal removido", "#/notificaciones");
        }
      }
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>
