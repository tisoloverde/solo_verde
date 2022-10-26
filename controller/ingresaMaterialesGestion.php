<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';
    $folio  = $_POST['folio'];

    $row = ingresaMaterialesGestion();

    if ($row != "Error" ) {
      echo json_encode($row);
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
