<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $checkboxs  = $_POST['checkboxs'];
    $idDesasig = $_POST['idDesasig'];

    $datos = json_decode($checkboxs, true);
    foreach ($datos as $value){
        $id = $value['id'];
        $diferencia = $value['span'];
        $estado = $value['status'];
        $newEstado = $estado ? 'Si' : 'No';
        $row = insertarChecksboxDesasignacion($idDesasig, $id, $newEstado, $diferencia);
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
