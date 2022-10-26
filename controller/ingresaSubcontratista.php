<?php
  ////ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){

    $row = '';
    $rut = $_POST['rutIngreso'];
    $nombre = $_POST['nombre'];
    $interno = $_POST['interno'];

    $row = ingresaSubcontratista($rut, $nombre, $interno);

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
