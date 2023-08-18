<?php
  // ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $checkboxs  = $_POST['checkboxs'];
    $idAsig = $_POST['idAsig'];

    foreach ($checkboxs as $value){
        $id = $value['id'];
        $estado = $value['status'];
        $newEstado = $estado == "true" ? 'Si' : 'No';
        $row = insertarChecksbox($idAsig, $id, $newEstado);
    }

    if ($row != "Error" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
