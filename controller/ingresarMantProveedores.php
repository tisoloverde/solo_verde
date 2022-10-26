<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $idSubcontrato = $_POST['idSubcontrato'];
    $idPais = $_POST['idPais'];
    $idAreaFuncional = $_POST['idAreaFuncional'];
    $idMoneda = $_POST['idMoneda'];
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $fono = $_POST['fono'];
    $grupoCuentas = $_POST['grupoCuentas'];
    $condicionPago = $_POST['condicionPago'];
    $contrato = $_POST['contrato'];
    $fin_contrato = $_POST['fin_contrato'];
    $acreditado = $_POST['acreditado'];

    $row = ingresarMantProveedores(
      $idSubcontrato, $idPais, $idAreaFuncional, $idMoneda,
      $rut, $nombre, $email, $direccion, $fono, $grupoCuentas, $condicionPago,
      $contrato, $fin_contrato, $acreditado
    );

    if($row == "Ok" ) {
      echo "OK";
    } else{
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
