<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $cadenas = $_POST['cadenas'];

    foreach ($cadenas as $cadena) {
      ingresarResultadoObs($cadena);
    }

    if ($row != "Error" ) {
      echo "Ok";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
