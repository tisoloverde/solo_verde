<?php
  require('../model/consultas.php');
  session_start();
  if (count($_POST) > 0) {
    $categorias = $_POST['categorias'];
    $idsFallas = $_POST['idsFallas'];

    $row = '';

    if (isset($categorias)) {
      foreach($categorias as $categoria) {
        $row = eliminarFormularioEstructuraCategoria($categoria);
      }
    }

    if (isset($idsFallas)) {
      foreach($idsFallas as $idFalla) {
        $row = eliminarFormularioEstructuraFalla($idFalla);
      }
    }

    if ($row == "Ok") {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>