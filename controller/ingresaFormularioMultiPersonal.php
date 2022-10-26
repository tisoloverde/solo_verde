<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = "";

    $idFormulario = $_POST['idFormulario'];
    $lstIdsPersonal = $_POST['lstIdsPersonal'];

    foreach ($lstIdsPersonal as $idPersonal) {
      $row = ingresarFormularioPersonal($idFormulario, $idPersonal);
    }

    if ($row != "Error") {
      echo "Ok";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
