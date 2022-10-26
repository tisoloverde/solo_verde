<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $familia = $_POST['familia'];
    $textofamilia = $_POST['textofamilia'];
    $categoria = $_POST['categoria'];
    $textocategoria = $_POST['textocategoria'];
    $idAuditoria = $_POST['idAuditoria'];

    $count = validarFormularioEstructuraCategoria($familia, $categoria, $idAuditoria);
    if ($count[0]['COUNT'] > 0) {
      echo "Sin datos";
    } else {
      $row = ingresaFormularioEstructuraCategoria($familia,$textofamilia,$categoria,$textocategoria,$idAuditoria);
      if ($row != 'Error') {
        echo "Ok";
      } else {
        echo "Sin datos";
      } 
    }
  } else{
    echo "Sin datos";
  }
?>
