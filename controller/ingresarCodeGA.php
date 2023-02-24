<?php
  ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $secret = $_SESSION['secret'];
    $rut = $_SESSION['rutUser'];
    $login2fa = (int)$_POST['login2fa'];
    $firma2fa = (int)$_POST['firma2fa'];
    $code = $_POST['codigo'];

    $row = insertarCodeGA($rut, $secret, $login2fa, $firma2fa);
    insertarCodeGATipo($rut, $login2fa, $firma2fa);
    if ($row != "Error" ) {
      unset($_SESSION['secret']);
      $token = md5($rut . rand());
      actualizaTokenLogin($rut, $token);
      $_SESSION['rutUser'] = $rut;
      setcookie("tk_w_o",$token,time()+900);
      $row['token'] = $token;
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
