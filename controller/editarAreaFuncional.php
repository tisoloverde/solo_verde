<?php
  ////ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){

    $row = '';
    $comuna = $_POST['comuna'];
    $provincia = $_POST['provincia'];
    $region = $_POST['region'];
    $codigoPostal = $_POST['codigoPostal'];
    $idPais = $_POST['idPais'];
    $idAreaFuncional = $_POST['idAreaFuncional'];
    $estado = $_POST['estado'];

    $row = editarAreaFuncional($comuna, $provincia, $region, $codigoPostal, $idPais, $idAreaFuncional, $estado);

    if($row == "Ok" )
    {
        echo "OK";
    }
    else{
        echo "Sin datos";
    }
  }
  else{
      echo "Sin datos";
  }
?>
