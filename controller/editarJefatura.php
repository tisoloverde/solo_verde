<?php
  ////ini_set('display_errors', 'On');
  require('../model/consultas.php');

  session_start();

  if (count($_POST) > 0) {
    $row = '';

    $rutNuevoJefe = $_POST['rutNuevoJefe'];
    $strlstPersonal = $_POST['strlstPersonal'];

    $strlstPersonal_cambio = str_replace(" ", "", str_replace("'","",$strlstPersonal['ids']));

    $row = actualizarJefe($rutNuevoJefe, $strlstPersonal['ids']);

    if ($row != "Error" ) {
      echo "Ok";
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>
