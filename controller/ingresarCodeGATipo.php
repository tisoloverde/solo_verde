<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $secret = $_SESSION['secret'];
    $rut = $_SESSION['rutUser'];
    $login2fa = $_POST['login2fa'];
    $firma2fa = $_POST['firma2fa'];
    $code = $_POST['codigo'];

    $row = insertarCodeGATipo($rut, $login2fa, $firma2fa);
    if ($row != "Error" ) {
      unset($_SESSION['secret']);
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
