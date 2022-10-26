<?php
  ////ini_set('display_errors', 'On');
  require('../model/consultas.php');
  require('templates/sendMailSolicitBoss.php');

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $mail = new PHPMailer();

  session_start();

  if (count($_POST) > 0) {
    $row = checkUsuarioSinPassPorRut($_SESSION['rutUser']);

    $nombreNuevoJefe = $row['NOMBRE'];
    $emailNuevoJefe = $row['EMAIL'];
    $strlstPersonal = $_POST['strlstPersonal'];
    $lstExJefes = $_POST['lstExJefes'];

    // var_dump($lstExJefes);

    if ($row != "error" ) {
      // sendToOneNewBoss($mail, $nombreNuevoJefe, $emailNuevoJefe, $strlstPersonal['nombres']);
      // $row = ingresaUsuarioNotificacionPorMail($emailNuevoJefe, 'Personal', "Le informamos que se le ha solicitado nuevo personal: <br />" . $strlstPersonal['nombres'], "Personal fue solicitado a su jefatura<br>" . $strlstPersonal['nombres'], "Personal solicitado", "#/notificaciones");
      for ($i=0; $i < count($lstExJefes); $i++) {
        $boss = $lstExJefes[$i][0];
        $personal = $lstExJefes[$i][1];
        sendToOneOldBoss($mail, $boss, $personal, $nombreNuevoJefe);
        $row2 = ingresaUsuarioNotificacionPorMail($boss, 'Personal', "Le informamos que la jefatura del siguiente personal ha sido solicitado por " . $nombreNuevoJefe . ": <br />" .
        $personal, "Personal a su cargo fue solicitado<br>" .  $personal, "Personal solicitado", "#/notificaciones");
      }
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>
