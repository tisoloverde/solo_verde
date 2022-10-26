<?php
  //ini_set('display_errors', 'On');
  session_start();
  require('../model/consultas.php');
  require_once 'gat/vendor/autoload.php';

  $ga = new PHPGangsta_GoogleAuthenticator();
  $secret = '';
  $secret = $ga->createSecret();
  $_SESSION['secret'] = $secret;
  $nombreEmpresa = nombreLogin($_POST['url']);
  $emailUsuarioLogin = chequeaUsuarioEmail($_SESSION['rutUser']);

  // echo "Secret is: ".$secret."<br><br><br>";

  $qrCodeUrl = $ga->getQRCodeGoogleUrl('Sistema Cryptodata: ' . $emailUsuarioLogin['EMAIL'], $secret, $_POST['url']);

  $oneCode = $ga->getCode($secret);

  // echo "Checking Code '$oneCode' and Secret '$secret'<br><br><br>";

  $checkResult = $ga->verifyCode($secret, $oneCode, 0);    // 2 = 2*30sec clock tolerance

  if ($checkResult) {
      echo $qrCodeUrl;
  } else {
      echo 'Error';
  }
?>
