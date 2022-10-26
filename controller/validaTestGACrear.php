<?php
  // //ini_set('display_errors', 'On');
	require('../model/consultas.php');
  session_start();

  require_once 'gat/vendor/autoload.php';

  $ga = new PHPGangsta_GoogleAuthenticator();

  $secret = $_SESSION['secret'];

  $oneCode = $_POST['codigo'];

  // echo "Checking Code '$oneCode' and Secret '$secret'<br><br><br>";

  $checkResult = $ga->verifyCode($secret, $oneCode, 0);    // 2 = 2*30sec clock tolerance

  if ($checkResult) {
    echo "Ok";
  }
	else {
    echo "Error";
  }
?>
