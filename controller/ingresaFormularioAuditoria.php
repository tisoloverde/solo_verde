<?php
  require('../model/consultas.php');
  session_start();

  if (count($_POST) > 0) {
    $titulo = $_POST['titulo'];

    $row = ingresaFormularioAuditoria($titulo);

    echo json_encode($row);
  } else {
    echo "Sin datos";
  }
?>
